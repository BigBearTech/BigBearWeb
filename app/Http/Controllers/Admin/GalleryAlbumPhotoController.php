<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Album;
use App\Photo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class GalleryAlbumPhotoController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
	}

	/**
	 *	Show the photos index
	 *
	 *	@return Response
	 */
	public function index(Gallery $gallery, Album $album)
	{
		$photos = Photo::where('attachment_id', '!=', 0)->get();
		return view('admin.gallery.album.photo.index', ['gallery' => $gallery, 'album' => $album, 'photos' => $photos]);
	}

	/**
	 *	Show the photos create
	 *
	 *	@return Response
	 */
	public function create(Gallery $gallery, Album $album)
	{
		return view('admin.gallery.album.photo.create', ['gallery' => $gallery, 'album' => $album]);
	}

	/**
	 *	Submit the photo
	 *
	 *	@return Response
	 */
	public function store(Request $request, Gallery $gallery, Album $album)
	{
        $file = $request->file('file');

		$attachment = app('Media')->upload($file);

        $photo = new Photo;
        $photo->title = $attachment->title;
        $photo->save();
        $request->user()->photos()->save($photo);
        $attachment->photos()->save($photo);

		return response()->json(['success' => true, 'file' => $attachment, 'photo' => $photo]);
	}

    /**
     *	Show the photos edit
     *
     *	@return Response
     */
    public function edit(Gallery $gallery, Album $album, Photo $photo)
    {
        return view('admin.gallery.album.photo.edit', ['gallery' => $gallery, 'album' => $album, 'photo' => $photo]);
    }

    /**
     *	Update the photo
     *
     *	@return Response
     */
    public function update(Request $request, Gallery $gallery, Album $album, Photo $photo)
    {
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->save();

        session()->flash('success', 'Successfully updated the photo');
        return redirect()->back();
    }
}
