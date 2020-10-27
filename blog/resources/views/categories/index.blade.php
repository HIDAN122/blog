@extends('layouts.panel')

@section('body_style', 'padding-top: 59px;')
@section('inner')
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Slug</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>

        </tr>
        </thead>
        @foreach($categories as $category)
            @if($category->parent_id != 0)
                <tbody>
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>{{$category->created_at}}</td>
                    <td>{{$category->updated_at}}</td>
                    <td><a role="button" class="btn btn-outline-primary" href="{{route('categories.edit',[$category->id])}}">Edit</a></td>
                    <td><a class="delete-button btn btn-outline-danger" data-title='Delete category "{{$category->name}}"?'
                           to="{{route('categories.index')}}" href="{{route('categories.destroy',[$category->id])}}">Delete</a>
                    </td>
                    </td>
                </tr>
                </tbody>
            @endif
        @endforeach

    </table>
    @if($categories->total() > $categories->count())
        <br>
        <div class="row justify-content-center">
                        {{$categories->links()}}
            <div class="col-12">
                <a class="btn btn-primary" href="{{route('categories.create')}}">Create category</a>
            </div>
        </div>
    @endif

@endsection




