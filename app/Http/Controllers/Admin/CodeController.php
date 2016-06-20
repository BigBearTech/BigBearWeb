<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class CodeController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
	}

    /**
     *  Show the index for the template codes
     *
     *  @return Response
     */
    public function index()
    {
        return view('admin.code.index');
    }
}
