@extends('common.master')

@section('title')
    Login
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 mx-auto mt-5">
                <div class="card shadow">
                    <div class="card-body">

                        @include('common.errors')
                        @include('common.success')


                        <form action="" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="username" class="col-form-label col-12 col-md-3">Username</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" class="form-control"
                                           value="{{old('username')}}"
                                           name="username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-form-label col-12 col-md-3">Password</label>
                                <div class="col-12 col-md-9">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="text-center mb-2">
                                <button class="btn btn-info" type="submit">
                                    Login
                                </button>
                            </div>
                            <p class="m-0">
                                <span class="text-muted">Does not have an account ?!</span>
                                <a href="/register">Register</a>
                            </p>
                            <p class="m-0">
                                <span class="text-muted">Return</span>
                                <a href="/">Home</a>
                            </p>
                            <p class="text-muted">All fields are required</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection