<?php

namespace Chatty\Http\Controllers;

use Illuminate\Http\Request;
use Chatty\Models\User;
use DB;

class SearchController extends Controller{
	public function getResults(Request $request){

		$query = $request->input('query');

		if(!$query){
			return redirect()->route('home');
		}

		$users = User::where('username','LIKE', "%{$query}%")
			->orWhere(DB::raw("CONCAT(first_name, ' ', last_name)"),'LIKE', "%{$query}%")
			->get();
		/*$users = User::orderBy('id','asc')->paginate(10);
		->orWhere('username', 'like', '%' . {$query} . '%')*/

		return view('search.results')->with('users', $users);
	}
}