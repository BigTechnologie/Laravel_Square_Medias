@extends('base')

@section('title')
    Admin Post
@endsection

@section('container')
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-2">
                <h2>Admin</h2>
            </div>
            <div class="col-md-10">
                <div class="create-btn d-flex justify-content-end my-2">
                    <a href="{{ route('admin.post.create') }}" class="btn btn-primary">Create Post</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Titre</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    <img src="{{ $post->imageUrl }}" height="200" alt="">
                                </td>
                                <td>{{ $post->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary">View</a>
                                    <a href="#" class="btn btn-warning">Edit</a>
                                    <a href="#" class="btn btn-danger">delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                  @include('paginate', ['datas' => $posts])
            </div>

        </div>
    </div>
@endsection