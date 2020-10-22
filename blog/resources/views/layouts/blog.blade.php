@extends('layouts.app')
@section('body_style', 'padding-top: 70px;q')
@section('content')

    <div class="container">

        <div class="row row-offcanvas row-offcanvas-right">
            <div class="col-12 col-md-9">
                <p class="float-right hidden-md-up">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="offcanvas">Toggle nav</button>
                </p>
                @if(isset($cat_root))
                    <div class="jumbotron">
                        <h1>{{$cat_root->name}}</h1>
                    </div>
                @else
                    <div class="jumbotron">
                        <h1>You are welcome</h1>
                        <p>
                            Welcome to the game blog "BlogMe".
                            We hope you find what you need.
                        </p>
                    </div>
                @endif
                @yield('inner')
            </div><!--/span-->

            <div class="col-6 col-md-3 sidebar-offcanvas" id="sidebar">
                <div class="list-group">
                    @if(isset($cat_root))
                        <a href="{{route('category.post', $cat_root->isParent() ? $cat_root->id : $cat_root->parent_id)}}"
                           class="list-group-item {{isset($cat_root) ? ($cat_root->isParent() ? 'active':''):''}}">All
                            posts</a>
                        @foreach(isset($cat_root) ? $categories->where('parent_id', $cat_root->isParent() ? $cat_root->id : $cat_root->parent_id) : $categories as $category)
                            <a href="{{route('category.post',[$category->id])}}"
                               class="list-group-item {{$cat_root->id == $category->id ? 'active':''}}">{{$category->name}}</a>
                        @endforeach
                    @else
                        @foreach($categories as $category)
                            <a href="{{route('category.post',[$category->id])}}"
                               class="list-group-item">{{$category->name}}</a>
                        @endforeach
                    @endif
                </div>
            </div><!--/span-->
        </div>

        <hr>
        <footer>
            <p>&copy; Company 2020</p>
        </footer>
    </div><!--/.container-->
@endsection
