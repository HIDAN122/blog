@extends('layouts.app')
@section('body_style', 'padding-top: 70px;q')
@section('content')

    <div class="container">

        <div class="row row-offcanvas row-offcanvas-right">
            <div class="col-12 col-md-9">
                <p class="float-right hidden-md-up">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="offcanvas">Toggle nav</button>
                </p>
                <div class="jumbotron">
                    <h1>Hello, world!</h1>
                    <p>This is an example to show the potential of an offcanvas layout pattern in Bootstrap. Try some
                        responsive-range viewport sizes to see it in action.</p>
                </div>
                @yield('inner')
            </div><!--/span-->

            <div class="col-6 col-md-3 sidebar-offcanvas" id="sidebar">
                <div class="list-group">
                    <a href="{{route('categories.index')}}" class="list-group-item active">All categories</a>
                    @foreach($categories as $category)
                            <a href="{{$category->id}}" class="list-group-item">{{$category->name}}</a>
                    @endforeach
                </div>
            </div><!--/span-->
        </div>

        <hr>
        <footer>
            <p>&copy; Company 2020</p>
        </footer>
    </div><!--/.container-->
@endsection
