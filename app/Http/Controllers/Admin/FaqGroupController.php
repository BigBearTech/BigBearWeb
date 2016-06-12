<?php

namespace App\Http\Controllers\Admin;

use App\FaqGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class FaqGroupController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
	}

	/**
	 *	Show the FAQ's groups index page
	 *
	 *	@return Response
	 */
	public function index()
	{
		$faqgroups = FaqGroup::with('user')->get();
		return view('admin.faqgroups.index', ['faqgroups' => $faqgroups]);
	}

	/**
	 *	Show the FAQ Group Create View
	 *
	 *	@return Response
	 */
	public function create()
	{
		return view('admin.faqgroups.create');
	}

	/**
	 *	Store the faq group in the database
	 *
	 *	@return Response
	 */
	public function store(Request $request)
	{
		$faqGroup = new FaqGroup;
		$faqGroup->title = $request->input('title');
		$faqGroup->description = $request->input('description');
		$faqGroup->save();
		$request->user()->faqgroups()->save($faqGroup);

		session()->flash('success', 'Successfully added faq group!');
		return redirect()->route('admin.faqgroups.edit', ['id' => $faqGroup->id]);
	}

	/**
	 *	Edit the faq group
	 *
	 *	@return Response
	 */
	public function edit(FaqGroup $faqgroups)
	{
		return view('admin.faqgroups.edit', ['faqGroup' => $faqgroups]);
	}

	/**
	 *	Update the faq group
	 *
	 *	@return Response
	 */
	public function update(Request $request, FaqGroup $faqgroups)
	{
		$faqGroup = $faqgroups;
		$faqGroup->title = $request->input('title');
		$faqGroup->description = $request->input('description');
		$faqGroup->save();

		session()->flash('success', 'Successfully updated faq group!');
		return redirect()->back();
	}
}
