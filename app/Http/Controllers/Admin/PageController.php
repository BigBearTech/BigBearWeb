<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;

class PageController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
	}

	/**
	 *	Show all the pages to the user.
	 *
	 *	@return Response
	 */
    public function index()
    {
    	$pages = Post::where('post_type', 'page')->get();
    	return view('admin.pages.index')->with(compact('pages'));
    }

    /**
     *	Show the create post page to the user.
     *
     *	@return Response
     */
    public function create()
    {
    	return view('admin.pages.create');
    }

    /**
   	 *	Store the post in the database.
   	 *
   	 *	@return Redirect
   	 */
    public function store(StorePageRequest $request)
    {
    	$post = new Post;
    	$post->name = $request->input('name');
    	$post->slug = str_slug($request->input('name'));
    	$post->content = $request->input('content');
    	$post->post_type = 'page';
    	$post->save();
    	$request->user()->posts()->save($post);

    	session()->flash('success', 'Successfully created post!');
    	return redirect()->route('admin.pages.index');
    }

    /**
   	 *	Show the edit page to the user
   	 *
   	 *	@return Response
   	 */
    public function edit(Post $pages)
    {
    	return view('admin.pages.edit')->with(['post' => $pages]);
    }

    /**
     *	Update the post
     *
     *	@return Redirect
     */
    public function update(UpdatePageRequest $request, Post $pages)
    {
    	$post = $pages;
    	$post->name = $request->input('name');
    	$post->slug = str_slug($request->input('slug'));
    	$post->content = $request->input('content');
    	$post->save();

    	session()->flash('success', 'Successfully updated post!');
    	return redirect()->back();
    }

    /**
     *	Delete the post specified from the database
     *
     *	@return Redirect
     */
    public function destroy(Post $pages)
    {
    	$pages->delete();

    	session()->flash('success', 'Successfully deleted post!');
    	return redirect()->back();
    }
}
