@extends('layouts.app')
@section('body_style', 'padding-top: 59px;')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <nav class="col-3 hidden-xs-down bg-faded sidebar">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('posts.index')}}">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('comments.index')}}">Comments</a>
                    </li>
                    @if((auth()->check() && auth()->user()->is_admin == 1))
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('categories.index')}}">Categories</a>
                    </li>
                    @endif
                </ul>

                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nav item</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nav item again</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">One more nav</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Another nav item</a>
                    </li>
                </ul>

                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nav item again</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">One more nav</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Another nav item</a>
                    </li>
                </ul>
            </nav>
            <div class="col-9 pt-3">
                @yield('inner')
            </div>
        </div>
    </div>
@endsection
