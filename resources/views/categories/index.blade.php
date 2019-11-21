@extends('layouts.app')


@section('content')
<div class="d-flex justify-content-end mb-2">
	
	<a href="{{route('categories.create') }}" class="btn btn-success">Add a Category</a>
</div>


<div class="card card-default">
	<div class="card-header">Categories	</div>
	<div class="card-body">
		
		<table class="table">
			
			<thead>
				<th>
					Nom
				</th>
				<th>
				
				</th>

			</thead>
			<tbody>
				@foreach($categories as $category)
<tr>
	<td>
		{{ $category->name }}
	</td>

	<td>
		<a href="{{ route('categories.edit', $category->id) }}" class="btn-info btn-sm">Edit </a>
		<button class="btn btn-danger btn-sm" onclick="handleDelete({{$category->id}})">Delete</button>
	</td>
</tr>
@endforeach
			</tbody>
		</table>
	</div>

</div>
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


@endsection

@section('script')
<script>
function handleDelete(id){

	$('#exampleModalScrollable').modal('show')
	var form=document.getElementById('handleDelete');
	form.action = '/categories/'+ id;
	console.log(form);

}
</script>
@endsection
