@extends('layouts.panel')
@section('body_style', 'padding-top: 70px;q')
@section('content')
    <form action="{{route('registrations.register')}}" class="form-signup">
        <div class="container">
            <div class="row row-offcanvas row-offcanvas-right">
                <div class="col-12 col-md-9">
                    <div class="col-md-6">

                        <h1 class="h3 mb-3 font-weight-normal align-content-center col-form-label">Please sign up</h1>
                        <label for="firstName" class="sr-only">First Name</label>
                        <input name="first_name" type="text" id="name" class="form-control align-content-center"
                               placeholder="First Name" required=""
                               autofocus="">
                        <br>

                        <label for="lastName" class="sr-only">Last Name</label>
                        <input name="last_name" type="text" id="lastName" class="form-control align-content-center"
                               placeholder="Last Name" required=""
                               autofocus="">
                        <br>


                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input name="email" type="email" id="inputEmail" class="form-control align-content-center"
                               placeholder="Email address" required=""
                               autofocus="">
                        <br>
                        <label for="inputPassword" class="sr-only align-content-center">Password</label>
                        <input name="password" type="password" id="inputPassword" class="form-control align-content-center"
                               placeholder="Password" required="">
                        <br>
                        <button class=" form-control align-content-center btn btn-lg btn-primary btn-block "
                                type="submit" >
                            Sign up
                        </button>
                        <p class="mt-5 mb-3 text-muted">© 2020</p>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
