@extends('layouts.panel')

@section('inner')
    @if($comments->count())
        @foreach($comments as $comment)
            <ul class="list-unstyled">
                <li class="media my-4">
                    <img style="height:64px;width:64px" src="/images/1.png" class="mr-3">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">{{$comment->subject}}</h5>
                        {{$comment->message}}
                    </div>

                </li>
            </ul>
            <div class="media-body">
                <a class="btn btn-secondary" href="{{route('posts.show', [$comment->post['id']])}}" role="button">View
                    this post &raquo;</a>
                @if(\Auth::user()->is_admin == 1)
                    <a role="button" href="{{route('comments.edit',[$comment->id])}}">Edit</a>
                @endif
            </div>
        @endforeach
    @else
        <div class="col-6 col-lg-4">
            <div class="alert alert-success">
                You have no comments
            </div>
        </div>
    @endif
@endsection
