<?php

namespace App\Http\Controllers\Admin;

use App\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;

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

    /**
     *	Store the testimonial
     *
     *	@return Response
     */
    public function store(StoreTestimonialRequest $request)
    {
    	$testimonial = new Testimonial;
    	$testimonial->user_id = $request->user()->id;
    	$testimonial->display_name = $request->input('display_name');
    	$testimonial->fullname = $request->input('fullname');
    	$testimonial->email = $request->input('email');
    	$testimonial->location = $request->input('location');
    	$testimonial->url = $request->input('url');
    	$testimonial->content = $request->input('content');
    	$testimonial->display_url = $request->input('display_url');
    	$testimonial->featured = $request->input('featured');
    	$testimonial->status = $request->input('status');
    	$testimonial->save();

    	session()->flash('success', 'Successfully stored testimonial!');
    	return redirect()->route('admin.testimonials.edit', ['testimonials' => $testimonial->id]);
    }

    /**
     *	Show the edit for testimonial
     *
     *	@return Response
     */
    public function edit(Testimonial $testimonials)
    {
    	return view('admin.testimonials.edit', ['testimonial' => $testimonials]);
    }

    /**
     *	Update a certain testimonial
     *
     *	@return Response
     */
    public function update(UpdateTestimonialRequest $request, Testimonial $testimonials)
    {
    	$testimonial = $testimonials;
    	$testimonial->user_id = $request->user()->id;
    	$testimonial->display_name = $request->input('display_name');
    	$testimonial->fullname = $request->input('fullname');
    	$testimonial->email = $request->input('email');
    	$testimonial->location = $request->input('location');
    	$testimonial->url = $request->input('url');
    	$testimonial->content = $request->input('content');
    	$testimonial->display_url = $request->input('display_url');
    	$testimonial->featured = $request->input('featured');
    	$testimonial->status = $request->input('status');
    	$testimonial->save();

    	session()->flash('success', 'Successfully updated testimonial!');
    	return redirect()->back();
    }
}
