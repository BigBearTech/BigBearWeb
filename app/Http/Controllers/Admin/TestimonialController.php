<?php

namespace App\Http\Controllers\Admin;

use App\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class TestimonialController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
	}

	/**
	 *	Show all the testimonials to the user.
	 *
	 *	@return Response
	 */
    public function index()
    {
    	$testimonials = Testimonial::all();
    	return view('admin.testimonials.index')->with(compact('testimonials'));
    }

	/**
	 *	Show the create view for the testimonials
	 *
	 *	@return Response
	 */
    public function create()
    {
    	return view('admin.testimonials.create');
    }
}
