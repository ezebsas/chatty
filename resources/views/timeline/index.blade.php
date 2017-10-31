@extends('templates.default')

@section('content')
	<div class="row">
		<div class="col-lg-6">
			<form role="form" action="{{ route('status.post') }}" method="post">
				<div class="form-group">
					<textarea placeholder="What's up {{ Auth::user()->getFirstNameOrUsername() }}" name="status" class="form-control" rows="2"></textarea>
				</div>
				<button type="submit" class="btn btn-default">Update status</button>
				<input class="hidden" name="_token" value="{{Session::token()}}"></input>
			</form>
			<hr>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-5">
			@if (!$statuses->count())
				<p>There is nothing in your timeline, yet.</p>
			@else
				@foreach ($statuses as $status)
					<div class="media">
						<a href="{{ route('profile.index', ['username' => $status->user->username]) }}" class="pull-left">
							<img src="{{ $status->user->getAvatarUrl() }}" class="media-object" alt="{{ $status->user->getFirstNameOrUsername() }}">
						</a>
						<div class="media-body">
							<h4 class="media-heading"><a href="{{ route('profile.index', ['username' => $status->user->username]) }}">{{ $status->user->getNameOrUsername() }}</a></h4>
							<p>{{ $status->body }}</p>
							<ul class="list-inline">
								<li> {{ $status->created_at->diffForHumans() }}</li>
								@if ($status->user->id !== Auth::user()->id)
									<li><a href="{{ route('status.like', ['statusId'=>$status->id]) }}">Like</a></li>
								@endif
								<li>10 likes</li>
							</ul>

							@foreach ($status->replies as $reply)
								<div class="media">
									<a class="pull-left" href="{{ route('profile.index', ['username' => $reply->user->username]) }}">
										<img class="media-object" alt="" src="{{ $reply->user->getAvatarUrl() }}">
									</a>	
									<div class="media-body">
										<h5 class="media-heading"> <a href="{{ route('profile.index', ['username' => $reply->user->username]) }}">{{ $reply->user->getNameOrUserName() }}</a></h5>
										<p>{{ $reply->body }}</p>
										<ul class="list-inline">
											<li> {{ $reply->created_at->diffForHumans() }}</li>
										@if ($reply->user->id !== Auth::user()->id)
											<li><a href="{{ route('status.like', ['statusId'=>$reply->id]) }}">Like</a></li>
										@endif
										<li>10 likes</li>
										</ul>
									</div>
								</div>
							@endforeach

							<form role="form" action="{{ route('status.reply', ['statusId' => $status->id]) }}" method="post">
								<div class="form-group">
									<textarea name="reply-{{$status->id}}" class="form-control" rows="2" placeholder="Reply to this status"></textarea>
								</div>
								<input type="submit" value="Reply" class="btn btn-default btn-sm">
								<input class="hidden" name="_token" value="{{Session::token()}}"></input>
							</form>

						</div>
					</div>
				@endforeach

				{!! $statuses->render() !!}
			@endif	
		</div>
	</div>
@endsection