<?php

namespace Chatty\Http\Controllers;

use Illuminate\Http\Request;
use Chatty\Models\User;

class ProfileController extends Controller{
	public function getProfile($username)
	{
		$user = User::where('username', $username)->first();

		if(!$user){
			abort(404);
		}

		//return view('profile.index')->with(['user', $user);
		return view('profile.index',['user' => $user, 'info' => 'asdf']);
	}
}