@extends('layouts.panel')

@section('body_style', 'padding-top: 59px;')
@section('inner')
    @if($category->exists)
        <form method="post" action="{{route('categories.update',[$category->id])}}">
            @method('PUT')
            @csrf
            @endif
            <div class="form-group">
                <label for="name">Name</label>
                <input value="{{$category->name}}" type="text" class="form-control" id="name" name="name">
            </div>
            <select name="parent_id"
                    id="parent_id"
                    class="form-control"
                    placeholder="Select category"
                    required>
                @foreach($categories as $cat)
                    <option value="{{$cat->id}}" @if($category->parent_id == $cat->id) selected @endif>
                        {{$cat->name}}
                    </option>
                @endforeach
            </select>
            <br>
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-danger" href="{{route('categories.destroy',[$category->id])}}">Delete</a>
        </form>
@endsection



