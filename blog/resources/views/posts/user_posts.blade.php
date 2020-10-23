@extends('layouts.panel')

@section('body_style', 'padding-top: 59px;')
@section('inner')
    @if($items->count())
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Short description</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                <th scope="col">Edit</th>

            </tr>
            </thead>
            @foreach($items as $post)
                <tbody>
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->short_description}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td><a role="button" href="{{route('posts.edit',[$post->id])}}">Edit</a></td>
                </tr>
                </tbody>
            @endforeach
        </table>
        <div class="col-12">
               <a class="btn btn-primary" href="{{route('posts.create')}}">Create post</a>
            </div>
        </div>

    @else
        <div class="col-12">
            <div class="alert alert-success">
                You have no posts, please create one<a href="{{route('posts.create')}}">Create post</a>
            </div>
        </div>
    @endif
@endsection
