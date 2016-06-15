<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class SettingController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
	}

    /**
     *  Show the general view
     *
     *  @return Response
     */
    public function getGeneral()
    {
        $getSetting = app('Settings')->get([
            'site_title',
            'email',
            'search_engine_visibility',
        ]);
        return view('admin.settings.general', ['setting' => $getSetting]);
    }

    /**
     *  Update the general settings
     *
     *  @return Response
     */
    public function postGeneral(Request $request)
    {
        app('Settings')->add('site_title', $request->input('site_title'));
        app('Settings')->add('email', $request->input('email'));
        app('Settings')->add('search_engine_visibility', $request->input('search_engine_visibility', 'false'));

        session()->flash('success', 'Successfully updated settings!');
        return redirect()->back();
    }
}
