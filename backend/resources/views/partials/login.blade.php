@extends('master')

@section('content')
<div class="block">
	<h3>Login</h3>
	<hr>
	@include('partials.errors')

	<form class="form-horizontal" role="form" method="POST" action="{{ url('login') }}">
		{!! csrf_field() !!}

		<div class="form-group">
			<label class="col-md-4 control-label">E-Mail Address</label>
			<div class="col-md-6">
				<input type="email" class="form-control" name="email" value="{{ old('email') }}">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Password</label>
			<div class="col-md-6">
				<input type="password" class="form-control" name="password">
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
				<div class="checkbox">
					<label>
						<input type="checkbox" name="remember"> Remember Me
					</label>
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
				<button type="submit" class="btn btn-primary">Login</button>
			</div>
		</div>
	</form>
</div>
@endsection