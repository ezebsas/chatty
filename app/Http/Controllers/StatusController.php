<?php

namespace Chatty\Http\Controllers;

use Illuminate\Http\Request;
use Chatty\Models\User;
use Auth;

class StatusController extends Controller{
	public function postStatus(Request $request)
	{
		$this->validate($request, [
			'status' => 'required | max:1000',
		]);

		Auth::user()->statuses()->create([
			'body' => $request->input('status'),
		]);

		return redirect()->route('home')->with('info', 'Status posted.');
	}

	public function postReply(Request $request, $statusId)
	{
		$this->validate($request, [
			"reply-{$statusId}" => 'required | max:1000',
		],[
			'required' => 'The reply body is required'
		]);
		dd('all ok');
	}
}