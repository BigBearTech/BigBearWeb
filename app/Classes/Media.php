<?php

namespace App\Classes;

use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

/**
* 
*/
class Media
{
	private function createStorageMedia()
	{
		$now = Carbon::now();
		Storage::disk('media')->makeDirectory($now->year . DIRECTORY_SEPARATOR . $now->month);
	}

	public function upload($file)
	{
		// Get the vars
		$now = Carbon::now();
		$getRealPath = $file->getRealPath();
		$getClientOriginalName = $file->getClientOriginalName();
		$getClientOriginalExtension = $file->getClientOriginalExtension();
		$getSize = $file->getSize();
		$getMimeType = $file->getMimeType();
		$path = storage_path('media' . DIRECTORY_SEPARATOR . $now->year . DIRECTORY_SEPARATOR . $now->month . DIRECTORY_SEPARATOR . $getClientOriginalName . '-' . str_random(5) . '.jpg');

		// Check if it's a valid file
		if(!$file->isValid())
		{
			return false;
		}


		// Make sure the media directory is in the storage
		$this->createStorageMedia();

		// Resize the image
		Image::make($file)->orientate()->encode('jpg', 80)->resize(960, 960, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($path);

        // Save image to db

        return true;
	}
}