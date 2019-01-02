@extends('master')

@section('content')
	<?php 
		$appData = App\App::first();
	?>
	<div class="cos hidden-md hidden-lg">
		<b>
			<a href="{{ url($link->url) }}">
				<i class="fa fa-external-link"></i>
				<span class="link-text">
					Continue To Site
				</span>
			</a>
		</b>
	</div>
	<div class="block">
		@include('partials.link')
		{!! $appData->ad !!}
		@include('partials.comments')
	</div>
@endsection