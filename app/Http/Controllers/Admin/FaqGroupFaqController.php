<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\FaqGroup;
use App\Faq;

class FaqGroupFaqController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
	}

	/**
	 *	Show the faqs that are for a group
	 *
	 *	@return Response
	 */
	public function index(FaqGroup $faqgroups)
	{
		$faqs = Faq::with('user')->get();
		return view('admin.faqgroups.faqs.index', ['faqGroup' => $faqgroups, 'faqs' => $faqs]);
	}

	/**
	 *	Show the faq create page
	 *
	 *	@return Response
	 */
	public function create(FaqGroup $faqgroups)
	{
		return view('admin.faqgroups.faqs.create', ['faqGroup' => $faqgroups]);
	}

	/**
	 *	Store the faq in the database
	 *
	 *	@return Response
	 */
	public function store(Request $request, FaqGroup $faqgroups)
	{
		$faq = new Faq;
		$faq->user_id = $request->user()->id;
		$faq->faq_group_id = $faqgroups->id;
		$faq->title = $request->input('title');
		$faq->description = $request->input('description');
		$faq->save();

		session()->flash('success', 'Successfully saved the faq!');
		return redirect()->route('admin.faqgroups.faqs.edit', ['faqgroups' => $faqgroups->id, 'faqs' => $faq->id]);
	}

	/**
	 *	Show the faq edit page
	 *
	 *	@return Response
	 */
	public function edit(FaqGroup $faqgroups, Faq $faqs)
	{
		return view('admin.faqgroups.faqs.edit', ['faqGroup' => $faqgroups, 'faq' => $faqs]);
	}

	/**
	 *	Show the faq edit page
	 *
	 *	@return Response
	 */
	public function update(Request $request, FaqGroup $faqgroups, Faq $faqs)
	{
		$faq = $faqs;
		$faq->title = $request->input('title');
		$faq->description = $request->input('description');
		$faq->save();

		session()->flash('success', 'Successfully save the faq!');
		return redirect()->back();
	}
}
