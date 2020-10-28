@extends('layouts.panel')

@section('body_style', 'padding-top: 59px;')
@section('inner')
    @if($category->exists)
        <form method="post" action="{{route('categories.update',[$category->id])}}">
            @method('PUT')
            @csrf
            @endif
            @if($errors->any())
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                            {{$errors->first()}}
                        </div>
                    </div>
                </div>
            @endif

            <div class="form-group">
                <label for="name">Name</label>
                <input value="{{$category->name}}" type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input value="{{$category->slug}}" type="text" class="form-control" id="slug" name="slug">
            </div>
            <p>Select category</p>
            <select name="parent_id"
                    id="parent_id"
                    class="form-control"
                    required>
                @foreach($categories as $cat)
                    <option value="{{$cat->id}}" @if($category->parent_id == $cat->id) selected @endif>
                        {{$cat->name}}
                    </option>
                @endforeach
            </select>
            <br>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
@endsection



