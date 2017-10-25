@if (Session::has('info'))
	<div class="alert alert-info" role="alert">
		{{Session::get('info')}}
	</div>
@endif


@if (count($errors) > 0)
@foreach ($errors->all() as $error)
<div class="alert alert-danger">
	{{$error}}
</div>
@endforeach
@endif
