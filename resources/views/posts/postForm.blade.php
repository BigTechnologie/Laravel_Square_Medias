<form action="{{ route('admin.post.store') }}" method="POST">
    @csrf 

	<div class="mb-3">
		<label for="title" class="form-label">Title</label>
		<input type="text" class="form-control" id="title" placeholder="Title ...">
	</div>
	<div class="mb-3">
		<label for="description" class="form-label">Description</label>
		<input type="text" class="form-control" id="description" placeholder="Description ...">
	</div>
	<div class="mb-3">
		<label for="content" class="form-label">Content</label>
		<textarea class="form-control" id="content" rows="3"></textarea>
	</div>
	<div class="submit">
		<button class="btn btn-success w100">
			Create
		</button>
	</div>

</form>
