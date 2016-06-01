<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
	}

	/**
	 *	Test for seeing the posts on the page
	 *
	 *	@return Response
	 */
    public function index()
    {
    	return view('admin.posts.index');
    }
}
