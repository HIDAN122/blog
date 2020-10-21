@extends('layouts.panel')

@section('body_style', 'padding-top: 59px;')
@section('inner')
    @if($post->exists)
        <form method="post" action="{{route('posts.update',[$post->id])}}">
            @method('PUT')
            @csrf
            @endif
            <div class="form-group">
                <label for="title">Title</label>
                <input value="{{$post->title}}" type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="short_description">Short description</label>
                <input value="{{$post->short_description}}" type="text" class="form-control" id="short_description"
                       name="short_description">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea  name="description" id="description" cols="70" rows="10"
                          class="form-control">{{$post->description}}</textarea>
            </div>
            <select name="category_id"
                    id="category_id"
                    class="form-control"
                    placeholder="Select category"
                    value="{{$post->category_id}}"
                    required>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($category->id == $post->category_id) selected @endif>
                        {{$category->slug}}
                    </option>
                @endforeach
            </select>
            <br>
            <button type="submit" class="btn btn-primary">Save</button>
            <a type="button" class="btn btn-danger" href="{{route('posts.destroy',[$post->id])}}">Delete</a>
        </form>

@endsection

