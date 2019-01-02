@extends('master')

@section('content')
	@include('partials.links')
	<div class="block">
		{!! $links->render() !!}
	</div>
@endsection