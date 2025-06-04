<form action="{{ route('admin.post.store') }}" method="POST">
    @csrf
   
    <div class="mb-3">
        <label for="title" class="form-label">Title</label> 
        <input value="{{old('title')}}" type="text" name="title" class="form-control" id="title" placeholder="Title ...">
        @error('title')
            <div class="text-danger">
                {{ $message }}        
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input value="{{old('description')}}" type="text" name="description" class="form-control" id="description" placeholder="Description ...">
        @error('description')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3"> 
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" name="content" id="content" rows="3">{{old('content')}}</textarea>
        @error('content')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
	<div class="mb-3">
		<label for="category_id" class="form-content">Categories</label>
		<select name="category_id" id="category_id" class="form-control">
			@foreach ($categories as $category)
				<option @if(old('category_id') == $category->id) selected @endif value="{{ $category->id }}">
					{{ $category->name }} 
				</option>
			@endforeach
		</select>
		 @error('category_id')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror

	</div>
	<div class="mb-3">
		<label for="imageUrl" class="form-control">Image</label>
		<input type="file" name="imageUrl" class="form-control" id="imageUrl">

		

	</div>
    <div class="submit">
        <button class="btn btn-success w100">
           @if(isset($post))
		   Update
		   @else 
		   Create
		   @endif
        </button>
    </div>
</form>

@section('scripts')
	<script>
		$(document).ready(function() {
			$('select').select2();
		})
	</script>
@endsection




