@extends('common.master')

@section('title')
    Home
@endsection


@section('content')
    @include('common.navbar')

    <div class="jumbotron jumbotron-fluid bg-light my-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h4 class="display-4">
                            E-Commerce System
                        </h4>
                        <p class="text-muted">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias delectus ducimus ea earum
                            eius eligendi error est expedita harum illum impedit in ipsum laboriosam laborum magnam,
                            modi officia officiis quos, sit, tenetur vitae voluptas voluptate? A possimus quidem
                            voluptatem.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="jumbotron jumbotron-fluid bg-white my-0 py-0">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($sliders as $k => $slider)
                    <li data-target="#carouselExampleCaptions" data-slide-to="{{$k}}"
                        class="{{$k == 0 ? "active" : ""}}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach($sliders as $k => $slider)
                    <div class="carousel-item {{$k == 0 ? "active" : ""}}">
                        <img src="{{$slider->image ? $slider->image->path : null}}" height="500"
                             class="d-block w-100"
                             alt="{{$slider->title}}">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="card">
                                <div class="card-body text-dark">
                                    <h5 class="h2">{{$slider->title}}</h5>
                                    <p>{{$slider->content}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button"
               data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button"
               data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


    <div class="container mt-5 mb-3">
        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold text-center">
                                    Categories
                                </h5>
                                <hr>

                                <ul class="list-unstyled">
                                    @foreach($cats as $cat)
                                        <li class="text-truncate text-dark mb-1">
                                            <a href="/categories/{{$cat->id}}"
                                               style="outline: none; text-decoration: none; color: black;">
                                                <span class="fa fa-caret-right"></span>
                                                <span>{{$cat->name}}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                    <li class="text-truncate text-dark mb-1">
                                        <a href="/categories"
                                           style="outline: none; text-decoration: none; color: red;">
                                            <span class="fa fa-caret-right"></span>
                                            <span>See More</span>
                                        </a>
                                    </li>
                                </ul>

                                <hr>
                                <h5 class="card-title text-center font-weight-bold">Popular Tags</h5>
                                <hr>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>

                                <br>
                                <span class="badge badge-primary badge-primary">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>

                                <br>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>

                                <br>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                {{--<div class="row">--}}
                {{--<div class="col-12">--}}
                {{--<div class=" mb-4 bg-light">--}}
                {{--<div class="">--}}
                {{--<input type="search" class="text-center form-control" placeholder="Search"--}}
                {{--style="width: 100%; margin: 0; padding: 0">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}

                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <p class="m-0 text-center font-weight-bold h5">
                                    New Arrivals
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach($arrivals as $product)
                        @include('common.product')
                    @endforeach
                </div>

                <div class="row mt-2">
                    <div class="col-12">
                        <div class="text-center mb-4">
                            <a href="/products/arrivals" class="text-muted"
                               style="outline: none; text-decoration: none;">
                                See More New Arraivals
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <p class="m-0 text-center font-weight-bold h5">
                                    Top Sales
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach($sales as $product)
                        @include('common.product')
                    @endforeach
                </div>

                <div class="row mt-2">
                    <div class="col-12">
                        <div class="text-center mb-4">
                            <a href="/products/top" class="text-muted"
                               style="outline: none; text-decoration: none;">
                                See More Top Sales
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('common.footer')
@endsection

@section('more-scripts')
    <script>
        $(document).ready(function () {
            $(".rateYo").rateYo({
                starWidth: "20px",
            });
        });
    </script>
@endsection