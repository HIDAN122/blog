@extends('layouts.blog')

@section('inner')
    <div class="row">
        @foreach($posts as $post)
            <div class="col-6 col-lg-4">
                <h2>{{$post->title}}</h2>
                <p>{{$post->short_description}}</p>
                <p><a class="btn btn-secondary" href="{{route('posts.show', ['post' => $post->id])}}" role="button">View details &raquo;</a></p>
            </div><!--/span-->
        @endforeach
    </div><!--/row-->
@endsection
