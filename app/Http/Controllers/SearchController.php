<?php

use Chatty\Models\User;
use DB;
namespace Chatty\Http\Controllers;

class SearchController extends Controller{
	public function getResults(Request $request){

		$query = $request->input('query');

		if(!$query){
			return redirect()->route('home');
		}

		$users = User::where(DB::raw("CONCAT(first_name, ' ', last_name"),'LIKE', "%{$query}%")
			->orWhere('username','LIKE', "%{$query}%")
			->get();

		dd($users);

		return view('search.results');
	}
}