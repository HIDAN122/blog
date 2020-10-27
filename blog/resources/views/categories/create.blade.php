@extends('layouts.panel')

@section('body_style', 'padding-top: 59px;')
@section('inner')
    <form method="POST" action="{{route('categories.store')}}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input  type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input  type="text" class="form-control" id="slug" name="slug">
        </div>
        <p>Select category</p>
        <select name="parent_id"
                id="parent_id"
                class="form-control"
                placeholder="Select main category"
                required>
            @foreach($mainCategories as $category)
                <option value="{{$category->id}}">
                    {{$category->name}}
                </option>
            @endforeach
        </select>
        <br>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection

