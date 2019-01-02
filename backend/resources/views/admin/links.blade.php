@extends('admin.layout')

@section('panel')
	<h3>Manage Links</h3>
	<hr>
	@include('partials.session')
	<div class="table-responsive">
	    <table class="table">
	    	<thead>
		    	<tr>
		    		<th>#</th>
		    		<th>Links</th>
		    		<th>Delete Link</th>
		    	</tr>
	    	</thead>
	    	<tbody>
	    		@foreach($links as $link)
		    		<tr>
		    			<td>{{ $link->id }}</td>
		    			<td class="warning">
			    			<a href="{{ url($link->hash) }}">
			    				{{ $link->title }}
			    			</a>
		    			</td>
		    			<td>
		    				<form role="form" method="POST" action="{{ url('link/' . $link->hash) }}">
		    					{{ method_field('DELETE') }}
		    					<input type="hidden" name="_token" value="{{ csrf_token() }}">
		    					<button type="submit" class="btn btn-danger">
			    					<i class="fa fa-trash"> Delete</i>
		    					</button>
			    			</form>
		    			</td>
		    		</tr>
	    		@endforeach
	    	</tbody>
	    	<tfoot>
	    		<tr>
	    			<th>
	    				{!! $links->render() !!}
	    			</th>
	    		</tr>
	    	</tfoot>
	    </table>
	</div>
@endsectionpp