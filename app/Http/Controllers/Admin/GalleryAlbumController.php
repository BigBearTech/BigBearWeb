<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Gallery;
use App\Album;

class GalleryAlbumController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
	}

	/**
	 *	Show the albums index
	 *
	 *	@return Response
	 */
	public function index(Gallery $gallery)
	{
		$albums = Album::get();
		return view('admin.gallery.album.index', ['gallery' => $gallery, 'albums' => $albums]);
	}

	/**
	 *	Show the create album view
	 *
	 *	@return Response
	 */
	public function create(Gallery $gallery)
	{
		return view('admin.gallery.album.create', ['gallery' => $gallery]);
	}

	/**
	 *	Store the album in the database
	 *
	 *	@return Response
	 */
	public function store(Request $request, Gallery $gallery)
	{
		$album = new Album;
		$album->title = $request->input('title');
		$album->description = $request->input('description');
		$album->save();
		$request->user()->albums()->save($album);
		$gallery->albums()->save($album);

        session()->flash('success', 'Successfully created the album!');
		return redirect()->route('admin.gallery.album.edit', ['gallery' => $gallery->id, 'album' => $album->id]);
	}

	/**
	 *	Show the edit for album view
	 *
	 *	@return Response
	 */
	public function edit(Gallery $gallery, Album $album)
	{
		return view('admin.gallery.album.edit', ['gallery' => $gallery, 'album' => $album]);
	}

    /**
    *	Update a specific album in the database
    *
    *	@return Response
    */
    public function update(Request $request, Gallery $gallery, Album $album)
    {
        $album->title = $request->input('title');
        $album->description = $request->input('description');
        $album->save();

        session()->flash('success', 'Successfully updated the album!');
        return redirect()->back();
    }
}
