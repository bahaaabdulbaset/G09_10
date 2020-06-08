@extends('common.master')

@section('title')
    Home
@endsection


@section('content')
    @include('common.navbar')

    <div class="jumbotron jumbotron-fluid bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <h6 class="display-4 mb-4">
                        E-Commerce Recommendation System
                        {{--Hello--}}
                        <i class="fa fa-user"></i>
                    </h6>
                    @php
                        $x = 10;
                    @endphp
                    @if($x > 5)
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, ad aliquid animi aperiam
                        architecto assumenda debitis deserunt dolor dolorem eaque earum eius eligendi eveniet
                        exercitationem
                        id impedit in inventore iste iure molestiae molestias nulla officiis pariatur placeat quae quam
                        quis
                    </p>
                    @endif
                    <div class="text-center mt-3">
                        <a href="Surfing.html">
                            <button class="btn btn-outline-info mt-3">Start Surfing...</button>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-12 text-center">
                    <img src="{{asset('assets/images/ecommerce.jpg')}}"
                         width="370" height="370" class="rounded-circle ">
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <h5 class="display-5 font-weight-bold">
                        Lorem ipsum dolor sit amet, consectetur.
                    </h5>
                    <p class="text-muted">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab eveniet harum ipsum maxime nemo
                        voluptatibus! Dignissimos ducimus earum explicabo laborum molestias quas tempore, unde ut?
                        Dolor,
                        earum exercitationem impedit in inventore itaque laborum nisi possimus quibusdam quisquam sed
                        sit
                        voluptates.
                    </p>
                    <div class="text-center mt-3">
                        <button class="btn btn-outline-info mt-3">Get Started</button>
                    </div>
                    <div class="text-center mt-5">
                        <img src="{{asset('assets/images/ecommerce.jpg')}}"
                             width="330" height="330" class="rounded-circle ">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="jumbotron jumbotron-fluid bg-info">
        <div class="container mb-5">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h4 class="display-5 font-weight-bold text-white">
                            Lorem ipsum dolor sit amet, consectetur.
                        </h4>
                        <p class="text-white">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab eveniet harum ipsum maxime nemo
                            voluptatibus! Dignissimos ducimus earum explicabo laborum molestias quas tempore, unde ut?
                            Dolor,
                            earum exercitationem impedit in inventore itaque laborum nisi possimus quibusdam quisquam
                            sed
                            sit
                            voluptates Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores minima officia
                            porro voluptatem. Ipsum, odio?
                        </p>
                        <div class="text-center mt-3">
                            <button class="btn btn-outline-light mt-3">Get Started</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="jumbotron jumbotron-fluid bg-white">
        <div class="container mb-5">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h4 class="display-5 font-weight-bold">
                            Lorem ipsum dolor sit amet, consectetur.
                        </h4>
                        <p class="">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab eveniet harum ipsum maxime nemo
                            voluptatibus! Dignissimos ducimus earum explicabo laborum molestias quas tempore, unde ut?
                            Dolor,
                            earum exercitationem impedit in inventore itaque laborum nisi possimus quibusdam quisquam
                            sed
                            sit
                            voluptates Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores minima officia
                            porro voluptatem. Ipsum, odio?
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="card shadow mt-3" style="width: 18rem;">
                        <div class="card-body">
                            <div class="text-center">
                                <h4 class="card-title text-info font-weight-bold">Card title</h4>
                            </div>
                            <div class="text-center">
                                <p class="card-text">Some quick example text to build on the card title</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow mt-3" style="width: 18rem;">
                        <div class="card-body">
                            <div class="text-center">
                                <h4 class="card-title text-info font-weight-bold">Card title</h4>
                            </div>
                            <div class="text-center">
                                <p class="card-text">Some quick example text to build on the card title</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow mt-3" style="width: 18rem;">
                        <div class="card-body">
                            <div class="text-center">
                                <h4 class="card-title text-info font-weight-bold">Card title</h4>
                            </div>
                            <div class="text-center">
                                <p class="card-text">Some quick example text to build on the card title</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-4">
                    <div class="card shadow mt-3" style="width: 18rem;">
                        <div class="card-body">
                            <div class="text-center">
                                <h4 class="card-title text-info font-weight-bold">Card title</h4>
                            </div>
                            <div class="text-center">
                                <p class="card-text">Some quick example text to build on the card title</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow mt-3" style="width: 18rem;">
                        <div class="card-body">
                            <div class="text-center">
                                <h4 class="card-title text-info font-weight-bold">Card title</h4>
                            </div>
                            <div class="text-center">
                                <p class="card-text">Some quick example text to build on the card title</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow mt-3" style="width: 18rem;">
                        <div class="card-body">
                            <div class="text-center">
                                <h4 class="card-title text-info font-weight-bold">Card title</h4>
                            </div>
                            <div class="text-center">
                                <p class="card-text">Some quick example text to build on the card title</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-4">
                    <div class="card shadow mt-3" style="width: 18rem;">
                        <div class="card-body">
                            <div class="text-center">
                                <h4 class="card-title text-info font-weight-bold">Card title</h4>
                            </div>
                            <div class="text-center">
                                <p class="card-text">Some quick example text to build on the card title</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow mt-3" style="width: 18rem;">
                        <div class="card-body">
                            <div class="text-center">
                                <h4 class="card-title text-info font-weight-bold">Card title</h4>
                            </div>
                            <div class="text-center">
                                <p class="card-text">Some quick example text to build on the card title</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow mt-3" style="width: 18rem;">
                        <div class="card-body">
                            <div class="text-center">
                                <h4 class="card-title text-info font-weight-bold">Card title</h4>
                            </div>
                            <div class="text-center">
                                <p class="card-text">Some quick example text to build on the card title</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-4">
                    <div class="card shadow mt-3" style="width: 18rem;">
                        <div class="card-body">
                            <div class="text-center">
                                <h4 class="card-title text-info font-weight-bold">Card title</h4>
                            </div>
                            <div class="text-center">
                                <p class="card-text">Some quick example text to build on the card title</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow mt-3" style="width: 18rem;">
                        <div class="card-body">
                            <div class="text-center">
                                <h4 class="card-title text-info font-weight-bold">Card title</h4>
                            </div>
                            <div class="text-center">
                                <p class="card-text">Some quick example text to build on the card title</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow mt-3" style="width: 18rem;">
                        <div class="card-body">
                            <div class="text-center">
                                <h4 class="card-title text-info font-weight-bold">Card title</h4>
                            </div>
                            <div class="text-center">
                                <p class="card-text">Some quick example text to build on the card title</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="jumbotron jumbotron-fluid bg-info">
        <div class="container mb-5">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h4 class="display-5 font-weight-bold text-white">
                            Lorem ipsum dolor sit amet, consectetur.
                        </h4>
                        <p class="text-white">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab eveniet harum ipsum maxime nemo
                            voluptatibus! Dignissimos ducimus earum explicabo laborum molestias quas tempore, unde ut?
                            Dolor,
                            earum exercitationem impedit in inventore itaque laborum nisi possimus quibusdam quisquam
                            sed
                            sit
                            voluptates Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores minima officia
                            porro voluptatem. Ipsum, odio Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo
                            omnis perferendis quo sequi sunt voluptatum.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="card shadow mt-3 bg-info" style="width: 10rem;">
                        <div class="card-body">
                            <div class="text-center">
                                &phone;
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card shadow mt-3 bg-info" style="width: 10rem;">
                        <div class="card-body">
                            <div class="text-center">
                                &phone;
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card shadow mt-3 bg-info" style="width: 10rem;">
                        <div class="card-body">
                            <div class="text-center">
                                &phone;
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card shadow mt-3 bg-info" style="width: 10rem;">
                        <div class="card-body">
                            <div class="text-center">
                                &phone;
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="card shadow mt-3 bg-info" style="width: 10rem;">
                        <div class="card-body">
                            <div class="text-center">
                                &phone;
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card shadow mt-3 bg-info" style="width: 10rem;">
                        <div class="card-body">
                            <div class="text-center">
                                &phone;
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card shadow mt-3 bg-info" style="width: 10rem;">
                        <div class="card-body">
                            <div class="text-center">
                                &phone;
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card shadow mt-3 bg-info" style="width: 10rem;">
                        <div class="card-body">
                            <div class="text-center">
                                &phone;
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="jumbotron jumbotron-fluid bg-white">
        <div class="container mb-5">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h4 class="display-5 font-weight-bold">
                            Lorem ipsum dolor sit amet, consectetur.
                        </h4>
                        <p class="">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab eveniet harum ipsum maxime nemo
                            voluptatibus! Dignissimos ducimus earum explicabo laborum molestias quas tempore, unde ut?
                            Dolor,
                            earum exercitationem impedit in inventore itaque laborum nisi possimus quibusdam quisquam
                            sed
                            sit
                            voluptates Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores minima officia
                            porro voluptatem. Ipsum, odio Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo
                            omnis perferendis quo sequi sunt voluptatum.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-3 mt-3">
                    <img src="{{asset('assets/images/ecommerce.jpg')}}"
                         width="270" height="240" class="rounded">
                </div>
                <div class="col-12 col-md-3 mt-3">
                    <img src="{{asset('assets/images/ecommerce.jpg')}}"
                         width="270" height="240" class="rounded">
                </div>
                <div class="col-12 col-md-3 mt-3">
                    <img src="{{asset('assets/images/ecommerce.jpg')}}"
                         width="270" height="240" class="rounded">
                </div>
                <div class="col-12 col-md-3 mt-3">
                    <img src="{{asset('assets/images/ecommerce.jpg')}}"
                         width="270" height="240" class="rounded">
                </div>
            </div>
        </div>
    </div>


    <div class="jumbotron jumbotron-fluid bg-info">
        <div class="container mb-5">
            <div class="row">
                <div class="col-12 col-md-8">
                    <h4 class="display-5 font-weight-bold text-white">
                        Lorem ipsum dolor sit amet, consectetur.
                    </h4>
                    <p class="text-white">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab eveniet harum ipsum maxime nemo
                        voluptatibus! Dignissimos ducimus earum explicabo laborum molestias quas tempore, unde ut?
                        Dolor,
                        earum exercitationem impedit in inventore itaque laborum nisi possimus quibusdam quisquam sed
                        sit
                        voluptates Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores minima officia
                        porro voluptatem. Ipsum, odio?
                    </p>
                    <button class="btn btn-outline-light">More Details</button>
                </div>
                <div class="col-12 col-md-4 text-right">
                    <img src="{{asset('assets/images/ecommerce.jpg')}}"
                         width="270" height="240" class="rounded">
                </div>
            </div>
        </div>
    </div>


    <div class="jumbotron jumbotron-fluid bg-white">
        <div class="container mb-5">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h4 class="display-5 font-weight-bold">
                            Lorem ipsum dolor sit amet, consectetur.
                        </h4>
                        <p class="">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab eveniet harum ipsum maxime nemo
                            voluptatibus! Dignissimos ducimus earum explicabo laborum molestias quas tempore, unde ut?
                            Dolor,
                            earum exercitationem impedit in inventore itaque laborum nisi possimus quibusdam quisquam
                            sed
                            sit
                            voluptates Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores minima officia
                            porro voluptatem. Ipsum, odio?
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <input type="text" id="subscribe" placeholder="Enter Email Address "
                               class="form-control text-center">
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('common.footer')
@endsection