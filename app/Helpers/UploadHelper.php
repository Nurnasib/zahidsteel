<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;

class UploadHelper
{
    public static function responsiveUpload($file, $folder = 'uploads/category')
    {
        if (!$file) return null;

        $path = public_path($folder);

        if (!File::exists($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        $name = uniqid() . time();
        $ext  = $file->getClientOriginalExtension(); // <-- use this, NOT extension()
        $original = $name . '.' . $ext;

        $file->move($path, $original);

        // SVGs can't be rasterized — return only the original
        if (strtolower($ext) === 'svg') {
            return [
                "original" => "$folder/$original",
                "small"    => "$folder/$original",
                "medium"   => "$folder/$original",
                "large"    => "$folder/$original",
            ];
        }

        // Raster images: create resized versions
        $manager = new ImageManager(new \Intervention\Image\Drivers\Gd\Driver());

        $small  = $name . '_400.'  . $ext;
        $medium = $name . '_768.'  . $ext;
        $large  = $name . '_1200.' . $ext;

        $manager->read($path . '/' . $original)->scale(width: 400) ->save($path . '/' . $small);
        $manager->read($path . '/' . $original)->scale(width: 768) ->save($path . '/' . $medium);
        $manager->read($path . '/' . $original)->scale(width: 1200)->save($path . '/' . $large);

        return [
            "original" => "$folder/$original",
            "small"    => "$folder/$small",
            "medium"   => "$folder/$medium",
            "large"    => "$folder/$large",
        ];
    }
    public static function uploadSingleImage($file, $folder = 'uploads/products')
    {
        if (!$file) {
            return null;
        }

        $manager = new ImageManager(new Driver());
        $path = public_path($folder);

        // Create folder if not exists
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $name = Str::random(20);
        $ext = $file->getClientOriginalExtension();
        $original = $name . '.' . $ext;

        // Move original file
        $file->move($path, $original);

        // Create resized versions
        $small = $name . '_400.' . $ext;
        $medium = $name . '_768.' . $ext;
        $large = $name . '_1200.' . $ext;

        $manager->read($path . '/' . $original)
            ->scale(width: 400)
            ->save($path . '/' . $small);

        $manager->read($path . '/' . $original)
            ->scale(width: 768)
            ->save($path . '/' . $medium);

        $manager->read($path . '/' . $original)
            ->scale(width: 1200)
            ->save($path . '/' . $large);

        return [
            "original" => "$folder/$original",
            "small" => "$folder/$small",
            "medium" => "$folder/$medium",
            "large" => "$folder/$large",
        ];
    }

    /**
     * Upload multiple images with responsive versions
     */
    public static function uploadMultipleImages($files, $folder = 'uploads/gallery')
    {
        if (!$files || !is_array($files)) {
            return [];
        }

        $uploadedImages = [];

        foreach ($files as $file) {
            $imageData = self::uploadSingleImage($file, $folder);
            if ($imageData) {
                $uploadedImages[] = $imageData;
            }
        }

        return $uploadedImages;
    }

    /**
     * Delete image and its responsive versions
     */
    public static function deleteImage($imagePath)
    {
        if (!$imagePath) {
            return false;
        }

        $pathInfo = pathinfo($imagePath);
        $directory = $pathInfo['dirname'];
        $filename = $pathInfo['filename'];
        $extension = $pathInfo['extension'];

        // Delete all versions
        $versions = [
            $imagePath, // original
            $directory . '/' . $filename . '_400.' . $extension,
            $directory . '/' . $filename . '_768.' . $extension,
            $directory . '/' . $filename . '_1200.' . $extension,
        ];

        foreach ($versions as $version) {
            $fullPath = public_path($version);
            if (file_exists($fullPath)) {
                @unlink($fullPath);
            }
        }

        return true;
    }
}
