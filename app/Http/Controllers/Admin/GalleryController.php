<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class GalleryController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
	}

	/**
	 *	Show the gallery index
	 *	
	 *	@return Response
	 */
	public function index()
	{
		$galleries = Gallery::get();
		return view('admin.gallery.index', ['galleries' => $galleries]);
	}

	/**
	 *	Show the gallery create
	 *	
	 *	@return Response
	 */
	public function create()
	{
		return view('admin.gallery.create');
	}

	/**
	 *	Store the gallery
	 *
	 *	@return Response
	 */
	public function store(Request $request)
	{
		$gallery = new Gallery;
		$gallery->title = $request->input('title');
		$gallery->description = $request->input('description');
		$gallery->save();
		$request->user()->galleries()->save($gallery);

		session()->flash('success', 'Successfully saved gallery!');
		return redirect()->route('admin.gallery.edit', ['gallery' => $gallery->id]);
	}

	/**
	 *	Show the edit for gallery
	 *
	 *	@return Response
	 */
	public function edit(Gallery $gallery)
	{
		return view('admin.gallery.edit', ['gallery' => $gallery]);
	}

	/**
	 *	Update the specific gallery
	 *
	 *	@return Response
	 */
	public function update(Request $request, Gallery $gallery)
	{
		$gallery->title = $request->title;
		$gallery->description = $request->description;
		$gallery->save();

		session()->flash('success', 'Successfully updated the gallery!');
		return redirect()->back();
	}
}
