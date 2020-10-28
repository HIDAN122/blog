@extends('layouts.panel')

@section('body_style', 'padding-top: 59px;')
@section('inner')
    <form method="POST" action="{{route('categories.store')}}">
        @csrf
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

