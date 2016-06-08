<?php

namespace App\Http\Controllers\Admin;

use App\Attachment;
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
		$attachments = Attachment::all();
		return view('admin.media.index')->with(compact('attachments'));
	}

	public function create()
	{
		return view('admin.media.create');
	}

	public function store(Request $request)
	{
		$file = $request->file('file');

		$attachment = app('Media')->upload($file);

		return response()->json(['success' => true, 'file' => $attachment]);
	}
}
