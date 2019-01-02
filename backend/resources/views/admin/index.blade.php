@extends('admin.layout')

@section('panel')
	<?php 
		$appData = App\App::first();
	?>
	<div class="block">
		<h3>Edit Website Details</h3>
		@include('partials.session')
		@include('partials.errors')
		<hr>
		<form action="{{ url('admin') }}" method="POST">
			{!! csrf_field() !!}
			<div class="form-group">
				<label class="control-label">Website Name</label>
				<input type="text" name="name" value="{{ $appData->name }}" class="form-control">
			</div>
			<div class="form-group">
				<label class="control-label">Website Description</label>
				<input type="text" name="description" value="{{ $appData->description }}" class="form-control">
			</div>
			<div class="form-group">
				<label class="control-label">Disqus Username</label>
				<input type="text" name="disqus" value="{{ $appData->disqus }}" class="form-control">
			</div>
			<div class="form-group">
				<label class="control-label">Advertisment Code</label>
				<input type="text" name="ad" value="{{ $appData->ad }}" class="form-control">
			</div>
			<button class="btn btn-block btn-primary">Update Website Details</button>
		</form>
	</div>
@endsection