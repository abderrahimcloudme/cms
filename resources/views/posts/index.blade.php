@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
	
	<a href="{{route('posts.create') }}" class="btn btn-success">Add a Post</a>
</div>

<div class="card card-default">
	<div class="card-header">Posts</div>
	<div class="card-body">
		<table class="table">
			<thead>
				<th>Image</th>
				<th>Titre</th>
				<th></th>
				<th></th>
			</thead>
			<tbody>
				@foreach($posts as $post)
					<tr>
						<td><img src="{{ asset($post->image) }}" alt=""></td>
						<td>{{ $post->title }}</td>
						<td></td>
						<td></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection