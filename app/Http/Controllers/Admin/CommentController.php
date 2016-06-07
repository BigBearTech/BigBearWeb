<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class CommentController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
	}

	/**
	 *	Show all the comments to the user.
	 *
	 *	@return Response
	 */
    public function index()
    {
    	$comments = Comment::all();
    	return view('admin.comments.index')->with(compact('comments'));
    }
}
