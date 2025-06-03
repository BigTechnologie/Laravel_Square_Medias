@extends('base')

@section('title')
   Blog home page
@endsection

@section('container')
    <div class="container">
        <h1>Posts for category : {{ $category->name }} </h1>

         <div class="posts row gx-0">
            @foreach ($category->posts as $post)
                <div class="post-item col-md-3">
                    <a href="{{ route('blog.show', ['id' =>$post->id, 'slug' => $post->slug]) }}" m-1 card>
                        <img src="{{ $post->imageUrl }}" height="200" alt="">
                        <div class="post-details p-1">
                            <h4>{{ $post->title }}</h4>
                            <p>{{ $post->description }}</p>
                            <small>{{ $post->created_at->diffForHumans() }}</small>
                     </div>
                    </a>
                </div>
            @endforeach
        </div>    

    </div>
    
@endsection