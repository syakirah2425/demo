<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    return view('image,upload');
}

	public function ImageUploadPost(Request $request)
	{
		$request->validate([
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		])

		$imageName = time().'.'.$request->image->extenstion();

		$request->image->move(public_path('images'),$imageName);

		return back()
		->with('success', 'you have successfully upload image.')
		->with('image', $imagename);
	}
}