@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <nav class="col-3 hidden-xs-down bg-faded sidebar">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('posts.index')}}">My post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('comments.index')}}">My comments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Export</a>
                    </li>
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
