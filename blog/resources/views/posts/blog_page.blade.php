@extends('layouts.blog')

@section('inner')
{{--    <div class="row row-offcanvas row-offcanvas-right">--}}
{{--        <div class="col-12 col-md-9">--}}
{{--            <div class="row">--}}
{{--                @foreach($items as $post)--}}
{{--                    <div class="col-6 col-lg-4">--}}
{{--                        <h2>{{$post->title}}</h2>--}}
{{--                        <p>{{$post->description}} </p>--}}
{{--                        <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>--}}
{{--                    </div><!--/span-->--}}
{{--                @endforeach--}}
{{--            </div><!--/row-->--}}
{{--        </div><!--/span-->--}}
{{--    </div><!--/row-->--}}
<div class="row">
    @foreach($items as $post)
    <div class="col-6 col-lg-4">
        <h2>{{$post->title}}</h2>
        <p>{{$post->description}}</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
    </div><!--/span-->
    @endforeach
</div><!--/row-->


@endsection
