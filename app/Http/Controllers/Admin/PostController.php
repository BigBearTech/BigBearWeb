<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
	}

	/**
	 *	Show all the posts to the user.
	 *
	 *	@return Response
	 */
    public function index()
    {
    	$posts = Post::all();
    	return view('admin.posts.index')->with(compact('posts'));
    }

    /**
     *	Show the create post page to the user.
     *
     *	@return Response
     */
    public function create()
    {
    	return view('admin.posts.create');
    }

    /**
   	 *	Store the post in the database.
   	 *
   	 *	@return Redirect
   	 */
    public function store(StorePostRequest $request)
    {
    	$post = new Post;
    	$post->name = $request->input('name');
    	$post->slug = str_slug($request->input('name'));
    	$post->content = $request->input('content');
    	$post->save();
    	$request->user()->posts()->save($post);

    	session()->flash('success', 'Successfully created post!');
    	return redirect()->route('admin.posts.index');
    }

    /**
   	 *	Show the edit page to the user
   	 *
   	 *	@return Response
   	 */
    public function edit(Post $posts)
    {
    	return view('admin.posts.edit')->with(['post' => $posts]);
    }

    /**
     *	Update the post
     *
     *	@return Redirect
     */
    public function update(UpdatePostRequest $request, Post $posts)
    {
    	$post = $posts;
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
    public function destroy(Post $posts)
    {
    	$posts->delete();

    	session()->flash('success', 'Successfully deleted post!');
    	return redirect()->back();
    }
}
