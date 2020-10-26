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
    @if($posts->total() > $posts->count())
        <br>
        <div class="row justify-content-center">
            <div class="clo-md-12">
                <div class="card">
                    <div class="card-body">
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
