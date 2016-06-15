<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
	}

	/**
	 *	Show the admin home view
	 *
	 *	@return Response
	 */
    public function index()
    {
    	$countUsers = User::count();
		$countPosts = Post::where('post_type', 'post')->count();
		$countPages = Post::where('post_type', 'page')->count();
    	return view('admin.home')->with(compact('countUsers', 'countPosts', 'countPages'));
    }
}
