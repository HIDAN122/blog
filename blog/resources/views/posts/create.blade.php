@extends('layouts.app')

@section('content')
    <form method="POST" action="{{route('posts.store')}}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input  type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" cols="70" rows="10" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Comment</button>
    </form>
@endsection

