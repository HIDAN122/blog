@extends('layouts.panel')

@section('body_style', 'padding-top: 59px;')
@section('inner')
    @if($comment->exists)
        <form method="post" action="{{route('comments.update',[$comment->id])}}">
            @method('PUT')
            @csrf
            @endif
            <div class="form-group">
                <label for="subject">Subject</label>
                <input value="{{$comment->subject}}" type="text" class="form-control" id="subject" name="subject">
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea  name="message" id="message" cols="70" rows="10"
                           class="form-control">{{$comment->message}}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-danger" href="{{route('comments.destroy',[$comment->id])}}">Delete</a>
        </form>


@endsection

