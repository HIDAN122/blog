@extends('layouts.app')
@section('body_style', 'padding-top: 70px;q')
@section('content')
    <form method="post" action="{{route('authenticate.index')}}" class="form-sign-in">
        @csrf
        <div class="container">
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif
            <div class="row row-offcanvas row-offcanvas-right">
                <div class="col-12 col-md-9">
                    <div class="col-md-6">
                        <h1 class="h3 mb-3 font-weight-normal align-content-center col-form-label">Please sign in</h1>
                        <label for="inputEmail" class="sr-only">Email</label>
                        <input type="email" id="inputEmail" class="form-control align-content-center"
                               placeholder="Email address" name="email">
                        <br>
                        <label for="inputPassword" class="sr-only align-content-center">Password</label>
                        <input type="password" id="inputPassword" class="form-control align-content-center"
                               placeholder="Password" name="password">
                        <br>
                        <button class=" form-control align-content-center btn btn-lg btn-primary btn-block "
                                type="submit">
                            Sign in
                        </button>
                    </div>
                </div>
            </div>
        </div>
@endsection
