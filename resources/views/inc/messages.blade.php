@if ($message = Session::get('success'))
<div class="container m-auto alert alert-success alert-block" tabindex="1" role="alert">
	<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>{{ $message }}</strong>
</div>

@endif

@if(count($errors) > 0)
@foreach($errors->all() as $error)

<div class="container m-auto alert alert-danger alert-block" tabindex="1" role="alert">
	<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>{{ $error }}</strong>
</div>
@endforeach
@endif
