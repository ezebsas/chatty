<?php

namespace Chatty\Http\Controllers;

use Illuminate\Http\Request;
use Chatty\Models\User;
use Auth;

class FriendController extends Controller{
	public function getIndex(){
		$friends = Auth::user()->friends();
		$requests = Auth::user()->friendRequests();

		return view('friends.index')
			->with('friends', $friends)
			->with('requests', $requests);
	}

	public function getAdd($username)
	{
		$user = User::where('username', $username)->first();

		if(!$user){
			return redirect()->route('home')->with('info', 'That user could not be found.');
		}
	}

}