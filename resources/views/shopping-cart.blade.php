@extends('common.master')

@section('title')
    My Shopping Cart
@endsection


@section('content')
    @include('common.navbar')

    <div class="jumbotron jumbotron-fluid bg-light my-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h4 class="display-4">
                            My Shopping Cart
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

    <div class="container">
        <div class="row my-4">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body mb-0">
                        @include('common.success')
                        @include('common.errors')
                        @if(count($lastOrderDetails) > 0)
                            <table class="table-bordered table table-hover table-bordered mb-0">
                                <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Quantity</th>
                                    <th>Overall</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $overallPrice = 0; @endphp
                                @foreach($lastOrderDetails as $k => $item)
                                    @php $product = $item->product; @endphp
                                    @php
                                        $overall = $item->price * $item->amount * (1 - $item->discount / 100);
                                        $overall = ceil($overall * 100) / 100;
                                        $overallPrice += $overall;
                                    @endphp
                                    <tr class="text-center">
                                        <td>{{$k + 1}}</td>
                                        <td width="35%">{{$product->name}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>{{$item->discount}} %</td>
                                        <td>{{$item->amount}}</td>
                                        <td>{{$overall}}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm mb-1"
                                               href="/prodcut/{{$item->product_id}}/details">
                                                More Details
                                            </a>
                                            <form action="/shopping-cart/delete" method="POST" id="removeForm">
                                                @csrf
                                                <input type="hidden" name="product" value="{{$product->id}}">
                                                <button id="removeBtn"
                                                        type="submit" class="btn btn-danger btn-sm">
                                                    Remove
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr class="text-center">
                                    <td colspan="5">Overall Price</td>
                                    <td colspan="2" class="font-weight-bold">
                                        {{$overallPrice}}
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <div class="text-center mt-3 form-inline">
                                <button class="btn btn-success mr-2 ml-auto">
                                    Checkout Order
                                </button>
                                <form action="/shopping-cart/delete-all"
                                      class="mr-auto"
                                      method="POST" id="removeAllForm">
                                    @csrf
                                    <button class="btn btn-danger" id="removeAllBtn">
                                        Cancel Order
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="alert alert-warning mb-0" role="alert">
                                You have no product currently in your shopping cart!
                            </div>
                        @endif
                    </div>
                </div>

                {{--<div class="mt-4">--}}
                    {{--<nav aria-label="Page navigation example">--}}
                        {{--<ul class="pagination justify-content-center">--}}
                            {{--@php--}}
                                {{--$no = ceil(\App\Category::find(55)->products->count() / 12);--}}
                            {{--@endphp--}}
                            {{--@for($i = 1; $i <= $no; $i++)--}}
                                {{--<li class="page-item">--}}
                                    {{--<a class="page-link" href="http://localhost/shopping-cart?p={{$i}}">{{$i}}</a>--}}
                                {{--</li>--}}
                            {{--@endfor--}}
                        {{--</ul>--}}
                    {{--</nav>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>


    @include('common.footer')
@endsection


@section('more-scripts')
    <script>
        $(document).ready(function () {
            $('#removeBtn').click(function (ev) {
                ev.preventDefault();
                var isConfirmed = confirm("Are you sure to delete the item from your cart?");
                if (isConfirmed) {
                    $('#removeForm').submit();
                }
            });

            $('#removeAllBtn').click(function (ev) {
                ev.preventDefault();
                var isConfirmed = confirm("Are you sure to cancel the order?");
                if (isConfirmed) {
                    $('#removeAllForm').submit();
                }
            });
        });
    </script>
@endsection