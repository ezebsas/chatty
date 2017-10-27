<?php

namespace Chatty\Http\Controllers;

use Illuminate\Http\Request;
use Chatty\Models\User;
use Auth;

class FriendController extends Controller{
	public function getIndex(){
		$friends = Auth::user()->friends();

		return view('friends.index')
			->with('friends', $friends);
	}

}