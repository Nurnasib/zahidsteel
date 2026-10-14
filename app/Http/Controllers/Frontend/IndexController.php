<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Factory;
use App\Models\Gallery;
use App\Models\Patner;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Team;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
         $data['sliders'] = Slider::orderBy('id','desc')->get();
         $data['blogs'] = Blog::orderBy('id','desc')->take(3)->get();
         $data['clients'] = Patner::orderBy('id','desc')->get();
        return view('frontend.index', $data);
    }
    public function blog(){
        $data['blogList'] = Blog::orderBy('id','desc')->get();
        $data['blogs'] = Blog::orderBy('id','desc')->take(3)->get();
        return view('frontend.blog.index',$data);
    }

    public function blogDetails($slug){
        $data['blog'] = Blog::where('slug',$slug)->first();
        $data['blogs'] = Blog::orderBy('id','desc')->take(3)->get();
        return view('frontend.blog.details',$data);
    }

    public function clientList(){
        $data['clientList'] = Patner::OrderBy('id','desc')->get();

        return view('frontend.client.index',$data);
    }

    public function aboutUse(){
        $data['bod'] = Team::where('teamType',1)->orderBy('serial')->orderBy('id','desc')->get();
        $data['et'] = Team::where('teamType',2)->orderBy('serial')->orderBy('id','desc')->get();

        return view('frontend.about-us', $data);
    }

    public function serviceDesign(){
        $data['page'] = \App\Models\ServicePage::where('key', 'design')->first();
        return view('frontend.services.show', $data);
    }

    public function serviceErection(){
        $data['page'] = \App\Models\ServicePage::where('key', 'erection')->first();
        return view('frontend.services.show', $data);
    }

    public function serviceFabrication(){
        $data['page'] = \App\Models\ServicePage::where('key', 'fabrication')->first();
        return view('frontend.services.show', $data);
    }

    public function serviceSupply(){
        $data['page'] = \App\Models\ServicePage::where('key', 'supply')->first();
        return view('frontend.services.show', $data);
    }

    public function completeProject(){
        $data['projects'] =Project::with('gallery')->where('status','active')->orderBy('id','desc')->get();

        return view('frontend.project.complete',$data);
    }
    public function runningProject(){
        $data['projects'] =Project::with('gallery')->where('status','inactive')->orderBy('id','desc')->get();
        return view('frontend.project.running',$data);
    }
    public function gallery(){
        $data['gallery'] = Gallery::with('gallery')->orderBy('id','desc')->get();

        return view('frontend.gallery',$data);
    }

    public function factory(){
        $data['factory'] = Factory::with('gallery')->orderBy('id','desc')->get();

        return view('frontend.factory',$data);
    }

    public function contactUs(){

        return view('frontend.contact-us');
    }

    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:100',
            'subject' => 'required|string|max:200',
            'phone'   => 'required|string|max:20',
            'message' => 'required|string|max:2000',
        ]);

        $sendMessage          = new Contact();
        $sendMessage->name    = $validated['name'];
        $sendMessage->email   = $validated['email'];
        $sendMessage->subject = $validated['subject'];
        $sendMessage->phone   = $validated['phone'];
        $sendMessage->message = $validated['message'];
        $sendMessage->save();

        return response()->json([
            'success' => true,
            'message' => 'Your message has been sent successfully!'
        ]);
    }
    public function brochure()
    {
        $setting = Setting::findOrFail(1);

        $path = public_path($setting->brochure);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline'
        ]);
    }
}
