<?php

namespace Chatty\Http\Controllers;
use Auth;
use Chatty\Models\Status;

class HomeController extends Controller{
	public function index(){
		if(Auth::check()){
			$statuses = Status::where(function($query){
				return $query->where('user_id', Auth::user()->id)
					->orWhereIn('user_id', Auth::user()->friends()->pluck('id'));
			})
			->orderBy('created_at', 'desc')
			//->get();
			->paginate(10);

			//dd($statuses);
			return view('timeline.index')->with('statuses', $statuses);

		}
		return view('home');
	}
}