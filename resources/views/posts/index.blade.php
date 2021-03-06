@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
	
	<a href="{{route('posts.create') }}" class="btn btn-success">Add a Post</a>
</div>

<div class="card card-default">
	<div class="card-header">Posts</div>
	<div class="card-body">
		@if($posts->count()>0)
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
						<td><img src="{{ asset('storage/'. $post->image) }}" width="60" alt=""></td>
						<td>{{ $post->title }}</td>
						@if($post->trashed())
							<td>
								<form action="{{ route('restore-posts', $post->id) }}" method="POST">
									@csrf
									@method('PUT')
									<button type="submit" class="btn btn-info btn-sm">Restore </button>
								</form>
							</td>
						@else
							<td>
								<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm">Edit </a>
							</td>
						@endif

						<td>

						<button class="btn btn-danger btn-sm" onclick="handleDelete({{$post->id}})">{{ $post->trashed() ? 'Delete' : 'Trash' }}</button>
						
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		 <!-- Modal -->
  
		 <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollable" aria-hidden="true">
				<div class="modal-dialog modal-dialog-scrollable" role="document">
						<form action="" method="POST" id="handleDelete">
				  <div class="modal-content">
					  @csrf
					  @method('DELETE')
					<div class="modal-header">
					  <h5 class="modal-title" id="exampleModalScrollableTitle">Delete</h5>
					  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
					</div>
					<div class="modal-body">
					  Do you want to delete this?
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Please</button>
					  <button type="submit" class="btn btn-danger">Yes, Please</button>
					</div>
				  </div>
				</form>
				</div>
			  </div>

		@else
			<h3 class="text-center">No posts yet! </h3>
		@endif

	</div>
</div>



@endsection


@section('script')

<script>
function handleDelete(id){

	$('#exampleModalScrollable').modal('show')
	var form=document.getElementById('handleDelete');
	form.action = '/posts/'+ id;
	console.log(form);

}
</script>
@endsection