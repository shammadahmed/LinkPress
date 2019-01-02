<div class="row">
	<div class="col-md-2 preview hidden-xs">
		<img src="{{ $link->image }}" alt="Website Preview" class="img-responsive">
	</div>
	<div class="col-md-10">
		<a href="{{ url($link->hash) }}"><h3>{{ $link->title }}</h3></a>
		<p>{{ $link->description }}</p>
		<a href="{{ $link->url }}">{{ $link->url }}</a>
		<div class="keywords">
			@foreach($link->keywords as $keyword)
				<span class="label label-warning">{{ $keyword->name }}</span>
			@endforeach
		</div>
		<div class="share-buttons hidden-xs">
			@include('links.share-buttons')
		</div>
	</div>
	<span class='divider'></span>
</div>