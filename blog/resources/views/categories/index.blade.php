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
                <td><a role="button" href="{{route('categories.edit',[$category->id])}}">Edit</a></td>
                <td><a class="btn btn-danger" role="button" href="{{route('categories.destroy',[$category->id])}}">Delete</a></td>
                @method('DELETE')
            </tr>
            </tbody>
            @endif
        @endforeach
    </table>
@endsection




