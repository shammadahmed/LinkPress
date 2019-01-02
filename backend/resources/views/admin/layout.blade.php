@extends('master')

@section('content')
	<div class="block">
		<div class="row">
		<div class="block">
			<h1 class="col-md-10 text-muted text-center">Howdy, Admin</h1>
			<div class="logout">
			<a href="{{ url('logout') }}" class="btn btn-warning pull-right col-md-2">Logout</a>
			</div>
		</div>
		</div>
		<hr>
		<div class="block">
			<ul class="nav nav-tabs nav-justified">
	  			  <li role="presentation"><a href="{{ url('admin') }}">General Settings</a></li>
				  <li role="presentation"><a href="{{ url('admin/user') }}">Admin Settings</a></li>
				  <li role="presentation"><a href="{{ url('admin/links') }}">Manage Link</a></li>
			</ul>
			@yield('panel')
		</div>
	</div>
@endsection