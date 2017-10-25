<?php

namespace Chatty\Http\Controllers;

use Illuminate\Http\Request;
use Chatty\Models\User;
use Auth;

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

	public function getEdit() {
		return view('profile.edit');
	}

	public function postEdit(Request $request) {
		$this->validate( $request, [
			'first_name' => 'string|max:50|nullable',
			'last_name' => 'string|max:50|nullable',
			'location' => 'string|max:30|nullable',
		]);

		Auth::user()->update([
			'first_name' => $request->input('first_name'),
			'last_name' => $request->input('last_name'),
			'location' => $request->input('location'),
		]);

		return redirect()->route('profile.edit')->with('info', 'Your profile has been updated.');
		
	}
}