@extends('layouts.panel')

@section('body_style', 'padding-top: 70px;')
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
        @endforeach
    @else
        <div class="col-6 col-lg-4">
            <div class="alert alert-success">
                You have no comments
            </div>
        </div>
    @endif
@endsection
