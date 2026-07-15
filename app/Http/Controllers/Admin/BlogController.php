<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Tag;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Str;

class BlogController extends Controller
{
    public function index()
    {

        $data['title'] = 'Add Blog';
        $data['dashboard'] = 'Dashboard';
        $data['subTitle'] = 'Blog List';
        $data['addTitle'] = 'Add New Blog';
        $data['editTitle'] = ' Edit Blog';
        $data['dataList'] = Blog::orderBy('id', 'desc')->get();

        return view('backend.blog.index', $data);
    }

    public function dataInfo($id = null)
    {

        if ($id) {

            $data['row'] = Blog::with(['writersInfo', 'tags'])->find($id);
            $data['title'] = 'Add Blog';
            $data['dashboard'] = 'Dashboard';
            $data['subTitle'] = 'Blog';
            $data['addTitle'] = 'Add New Blog';
            $data['editTitle'] = ' Edit Blog';
            $data['writers'] = Writer::orderBy('id', 'desc')->get();
            $data['categories'] = BlogCategory::orderBy('id', 'desc')->get();
            $data['tags'] = Tag::orderBy('id', 'desc')->get();

            return view('backend.blog.create', $data);

        } else {
            $data['title'] = 'Add Blog';
            $data['dashboard'] = 'Dashboard';
            $data['subTitle'] = 'Blog';
            $data['addTitle'] = 'Add New Blog';
            $data['editTitle'] = ' Edit Blog';
            $data['writers'] = Writer::orderBy('id', 'desc')->get();
            $data['tags'] = Tag::orderBy('id', 'desc')->get();
            $data['categories'] = BlogCategory::orderBy('id', 'desc')->get();

            return view('backend.blog.create', $data);

        }
    }

    public function addOrUpdateInfo(Request $request, $id = null)
    {

        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable',
            'description' => 'nullable',
            'short_description' => 'nullable',
            'seo_title' => 'nullable',
            'seo_description' => 'nullable',
            'category_id' => 'nullable',
            'readingTime' => 'nullable',
            'createdTime' => 'nullable',

        ]);

        DB::beginTransaction();
        try {
            // Find existing blog or create a new one
            $dataInfo = $id ? Blog::find($id) : new Blog;

            if (! $dataInfo) {
                return back()->with('error', 'Blog not found.');
            }

            // Assign values
            $dataInfo->title = $validatedData['title'];
            $dataInfo->slug = Str::slug($validatedData['title'].'-'.rand(10000, 9999));
            $dataInfo->short_description = $validatedData['short_description'] ?? null;
            $dataInfo->description = $validatedData['description'] ?? null;
            $dataInfo->seo_title = $validatedData['seo_title'] ?? null;
            $dataInfo->seo_description = $validatedData['seo_description'] ?? null;
            $dataInfo->meta_title = $validatedData['meta_title'] ?? null;
            $dataInfo->meta_description = $validatedData['meta_description'] ?? null;
            $dataInfo->category_id = $validatedData['category_id'] ?? null;
            $dataInfo->readingTime = $validatedData['readingTime'] ?? null;
            $dataInfo->createdTime = $validatedData['createdTime'] ?? null;
            // Handle image upload
            if ($request->hasFile('image')) {
                $image_tmp = $request->file('image');
                $manager = new ImageManager(new Driver);

                // Define upload path
                $uploadPath = public_path('assets/images/blog');

                // Create folder if not exists
                if (! File::exists($uploadPath)) {
                    File::makeDirectory($uploadPath, 0755, true);
                }

                // Optional: delete old image if updating
                if ($id && ! empty($dataInfo->image) && File::exists(public_path($dataInfo->image))) {
                    File::delete(public_path($dataInfo->image));
                }

                // Create unique filename
                $fileName = uniqid('blog_').'.'.$image_tmp->getClientOriginalExtension();

                // Resize and save
                $img = $manager->read($image_tmp)->toJpeg(80);
                $img->save($uploadPath.'/'.$fileName);

                // Store path in database
                $dataInfo->image = 'assets/images/blog/'.$fileName;
            }

            if ($request->hasFile('seo_image')) {
                $seoImage = $request->file('seo_image');
                $manager = new ImageManager(new Driver);

                $uploadPath = public_path('assets/images/blog/seo');

                if (! File::exists($uploadPath)) {
                    File::makeDirectory($uploadPath, 0755, true);
                }

                if ($id && ! empty($dataInfo->seo_image) && File::exists(public_path($dataInfo->seo_image))) {
                    File::delete(public_path($dataInfo->seo_image));
                }

                $fileName = uniqid('seo_').'.'.$seoImage->getClientOriginalExtension();

                $img = $manager->read($seoImage)->resize(660, 565)->toJpeg(80);
                $img->save($uploadPath.'/'.$fileName);

                $dataInfo->seo_image = 'assets/images/blog/seo/'.$fileName;
            }

            // Handle tags

            // Save to database
            if ($dataInfo->save()) {
                if (! empty($request->tagId)) {
                    $tagIds = [];
                    foreach ($request->tagId as $tag) {
                        if (is_numeric($tag)) {
                            $tagIds[] = $tag;
                        } else {
                            // Create new tag if it doesn't exist
                            $newTag = Tag::firstOrCreate(['title' => $tag]);
                            $tagIds[] = $newTag->id;
                        }
                    }
                    // Sync tags with the blog
                    $dataInfo->tags()->sync($tagIds); // Assuming a many-to-many relationship
                }
                if (! empty($request->writerId)) {
                    $writerIds = [];
                    foreach ($request->writerId as $writer) {
                        if (is_numeric($writer)) {
                            $writerIds[] = $writer;
                        }
                    }
                    // Sync categories with the blog
                    $dataInfo->writers()->sync($writerIds);
                }

                DB::commit();

                return redirect()->route('admin.blog.index')->with('success', $id ? 'Blog updated successfully.' : 'Blog added successfully.');
            } else {
                DB::rollBack();

                return back()->with('error', 'Failed to save Blog. Please try again.');
            }
        } catch (\Exception $err) {

            DB::rollBack();
            if (app()->environment('local')) {
                dd($err);
            }

            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function dataInfoDelete($id = null)
    {

        $dataInfo = Blog::find($id);
        $dataInfo->delete();

        return back()->with('success', 'Gallery Delete successfully.');
    }
}
