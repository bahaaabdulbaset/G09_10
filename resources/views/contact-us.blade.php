@extends('common.master')

@section('title')
    Contact Us
@endsection


@section('content')
    @include('common.navbar')

    <div class="jumbotron jumbotron-fluid bg-silver">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 class="display-3">
                        Contact Us
                    </h4>
                    <hr style="width: 50%; margin-left: 0">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, ad aliquid animi aperiam
                        architecto assumenda debitis deserunt dolor dolorem eaque earum eius eligendi eveniet exercitationem
                        id impedit in inventore iste iure molestiae molestias nulla officiis pariatur placeat quae quam quis
                        quod quos recusandae saepe similique tempore, totam voluptates! Reiciendis, repudiandae!
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-4">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item">Contact Us</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                @include('common.success')
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <img src="{{asset('assets/images/Jellyfish.jpg')}}" style="width: 100%; height: 350px">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 mt-4">
                <h5 class="display-5 ">Contact Information</h5>
                <hr>
                <p class="font-weight-bold">Address(1)</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, iste.</p>
                <hr>
                <p class="font-weight-bold">Address(2)</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, iste.</p>
                <hr>
                <p class="font-weight-bold">Telephone and Faxes</p>
                <p>&phone; 01090572176</p>
                <p>&phone; 01090572176</p>
                <p>&phone; 01090572176</p>
            </div>
            <div class="col-12 col-md-6 mt-4">
                <h5 class="display-5">Your Feedback</h5>
                <hr>
                @include('common.errors')
                <div class="card mb-2">
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="username" class="col-form-label col-12 col-md-3 font-weight-bold">Name</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-form-label col-12 col-md-3 font-weight-bold">Email</label>
                                <div class="col-12 col-md-9">
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-form-label col-12 col-md-3 font-weight-bold">Phone</label>
                                <div class="col-12 col-md-9">
                                    <input type="tel" class="form-control" name="phone">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="feedback" class="col-form-label col-12 col-md-3 font-weight-bold">Feedback</label>
                                <div class="col-12 col-md-9">
                                    <textarea name="feedback" cols="30" rows="2"
                                              class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-info">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('common.footer')
@endsection