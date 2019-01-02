<div class="shortener">
	<div class="block">
		<h1 class="text-center">Share &amp; Shorten Links</h1>
		<h4 class="text-muted text-center hidden-xs">UNLEASH THE POWER OF THE LINK</h4>
		@include('partials.errors')
		<form action="{{ route('link.store') }}" method="POST">
			{{ csrf_field() }}
			<div class="input-group">
				<input type="text" name="url" placeholder="https://www.google.com" class="form-control input">
				<div class="input-group-btn">
					<button type="submit" class="btn btn-primary btn-block">
						<i class="fa fa-long-arrow-right fa-lg"></i>
					</button>
				</div>
			</div>
		</form>
	</div>
</div>