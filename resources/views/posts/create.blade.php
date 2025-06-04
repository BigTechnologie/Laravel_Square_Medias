@extends('base')

@section('title')
    Admin Post
@endsection

@section('container')
    <div class="container">
         <div class="col-md-2">
            <h2>Admin</h2>
        </div>
         <div class="create-btn d-flex justify-content-end my-2">
            <a href="{{ route('admin.post.index') }}" class="btn btn-primary">Retour</a>
        </div>
        @include('posts.postForm')
    </div>
@endsection

