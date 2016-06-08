<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class MediaController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
	}

	public function index()
	{
		# code...
	}

	public function store(Request $request)
	{
		$file = $request->file('file');

		app('Media')->upload($file);

		return response()->json(['success' => true]);
	}
}
