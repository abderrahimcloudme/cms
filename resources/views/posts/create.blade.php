@extends('layouts.app')

@section('content')

<div class="card card-default">
	<div class="card-header"> Create Post</div>
	<div class="card-body">
@if($errors->any())
<div class="alert alert-danger">
	<ul class="list-group">
		@foreach($errors->all() as $error)

		<li class="list-group-item text-danger">
			{{ $error }}
		</li>

		@endforeach
	</ul>

</div>
@endif

		<form action="{{  isset($post) ? route('posts.update' , $post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
			@csrf

			@if(isset($post))
			@method('PUT')
			@endif

			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" class="form-control" id="title" name="title" value="{{ isset($post) ? $post->title : '' }}" >
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea name="description" id="description" class="form-control"  cols="5" rows="5">{{ isset($post) ? $post->description : '' }}</textarea>
			</div>
			<div class="form-group">
				<label for="content">Content</label>
				<textarea name="content" id="content" class="form-control"  cols="5" rows="5"  >{{ isset($post) ? $post->content : '' }}</textarea>
			</div>
			<div class="form-group">
				<label for="publier_le">Publier le</label>
				<input type="text" class="form-control" id="publier_le" name="publier_le" value="{{ isset($post) ? $post->publier_le : '' }}"  >
			</div>
			<div class="form-group">
				<label for="image">Image</label>
				<input type="file" class="form-control" id="image" name="image" value="{{ isset($post) ? $post->image : '' }}" >
			</div>
			<div class="form-group">
				<button class="btn btn-success">Add Post</button>
			</div>

		</form>
	</div>
</div>

@endsection