@extends('layouts.app')

@section('content')

<div class="card card-default">
	<div class="card-header"> Create Post</div>
	<div class="card-body">
		<form action="{{ route('posts.store')}}" method="POST">
			@csrf
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" class="form-control" id="title" name="title" >
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea name="description" id="description" class="form-control"  cols="5" rows="5"></textarea>
			</div>
			<div class="form-group">
				<label for="content">Content</label>
				<textarea name="content" id="content" class="form-control"  cols="5" rows="5"></textarea>
			</div>
			<div class="form-group">
				<label for="publier_le">Publier le</label>
				<input type="text" class="form-control" id="publier_le" name="publier_le" >
			</div>
			<div class="form-group">
				<label for="image">Image</label>
				<input type="file" class="form-control" id="image" name="image" >
			</div>
			<div class="form-group">
				<button class="btn btn-success">Add Post</button>
			</div>

		</form>
	</div>
</div>

@endsection