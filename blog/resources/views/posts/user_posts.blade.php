@extends('layouts.panel')

@section('body_style', 'padding-top: 59px;')
@section('inner')
    @if(session()->has('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">x</span>
            </button>
            {{session('success')}}
        </div>
    @endif
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
                    <th scope="col">Delete</th>

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
                        <td><a role="button" class="btn btn-outline-primary" href="{{route('posts.edit',[$post->id])}}">Edit</a>
                        </td>
                        <td><a class="delete-button btn btn-outline-danger" data-title='Delete post "{{$post->title}}"?'
                               to="{{route('posts.index')}}" href="{{route('posts.destroy',[$post->id])}}">Delete</a>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
            @if($items->total() > $items->count())
                <br>
                <div class="row justify-content-center">
                    {{$items->links()}}
                </div>
            @endif
            <div class="col-12">
                <a class="btn btn-primary" href="{{route('posts.create')}}">Create post</a>
            </div>
            </div>


        @else
            <div class="col-12">
                <div class="alert alert-success">
                    You have no posts, please create one <a href="{{route('posts.create')}}">Create post</a>
                </div>
            </div>
        @endif
@endsection
