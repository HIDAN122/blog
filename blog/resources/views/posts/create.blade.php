@extends('layouts.panel')

@section('body_style', 'padding-top: 59px;')
@section('inner')
    <form method="POST" action="{{route('posts.store')}}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input  type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="short_description">Short description</label>
            <input  type="text" class="form-control" id="short_description" name="short_description">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea  name="description" id="description" cols="70" rows="10" class="form-control"></textarea>
        </div>
        <select name="category_id"
                id="category_id"
                class="form-control"
                placeholder="Select category"
                required>
            @foreach($categories as $category)
                <option value="{{$category->id}}">
                    {{$category->slug}}
                </option>
            @endforeach
        </select>
        <br>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection

