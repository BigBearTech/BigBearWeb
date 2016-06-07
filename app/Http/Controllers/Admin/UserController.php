<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
	}

	/**
	 *	Show all the users to the admin
	 *
	 *	@return Response
	 */
    public function index()
    {
    	$users = User::all();
    	return view('admin.users.index')->with(compact('users'));
    }

    /**
     *	Show the create user page to the user.
     *
     *	@return Response
     */
    public function create()
    {
    	return view('admin.users.create');
    }

    /**
   	 *	Store the user in the database.
   	 *
   	 *	@return Redirect
   	 */
    public function store(StoreUserRequest $request)
    {
    	$user = new User;
    	$user->name = $request->input('name');
    	$user->email = $request->input('email');
    	$user->password = bcrypt($request->input('password'));
    	$user->role = $request->input('role');
    	$user->save();

    	session()->flash('success', 'Successfully created user!');
    	return redirect()->route('admin.users.index');
    }

    /**
   	 *	Show the edit page to the user
   	 *
   	 *	@return Response
   	 */
    public function edit(User $users)
    {
    	return view('admin.users.edit')->with(['user' => $users]);
    }

    /**
     *	Update the user
     *
     *	@return Redirect
     */
    public function update(UpdateUserRequest $request, User $users)
    {
    	$user = $users;
    	$user->name = $request->input('name');
    	$user->email = $request->input('email');
    	if($request->has('password') && !empty($request->input('password'))) {
    		$user->password = bcrypt($request->input('password'));
    	}
    	$user->role = $request->input('role');
    	$user->save();

    	session()->flash('success', 'Successfully updated post!');
    	return redirect()->back();
    }

    /**
     *	Delete the user specified from the database
     *
     *	@return Redirect
     */
    public function destroy(User $users)
    {
    	$users->delete();

    	session()->flash('success', 'Successfully deleted post!');
    	return redirect()->back();
    }
}
