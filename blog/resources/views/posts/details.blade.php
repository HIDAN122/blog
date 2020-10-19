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
                    <h1>{{$post->title}}</h1>
                    <p>{{$post->short_description}}</p>
                </div>
                <div class="align-content-center">
                    <p>{{$post->description}}</p>
                </div>
                <div>
                    <h3>Comments</h3>
                </div>
                @foreach($post->comments as $comment)
                    <ul class="list-unstyled">
                        <li class="media my-4">
                            <img style="height:64px;width:64px" src="/images/1.png" class="mr-3">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">{{$comment->subject}}</h5>
                                {{$comment->message}}
                            </div>
                        </li>
                @endforeach

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{route('comments.store')}}">
                    @csrf
                    <input type="hidden" name="post_id" value="{{$post->id}}" />
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input  type="text" class="form-control" id="subject" name="subject">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" cols="70" rows="10" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Comment</button>
                </form>
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

