@extends('base')

@section('title')
    Admin Post
@endsection

@section('container')
    <div class="row mt-2">
        <div class="col-md-2">
            <h2>Admin</h2>
        </div>
        <div class="col-md-10">
            <div class="create-btn d-flex justify-content-end my-2">
                <a href="{{ route('admin.post.index') }}" class="btn btn-primary">Retour</a>
            </div>
            <form action="">
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
        </div>
    </div>
@endsection