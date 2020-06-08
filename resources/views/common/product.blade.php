<div class="col-12 col-md-4 mb-0 mb-md-3">
    <div class="card shadow">
        <img src="{{$product->image? $product->image->path: null}}"
             class="card-img-top" height="175">
        <div class="card-body">
            <h5 class="card-title text-center font-weight-bold text-truncate m-0 mb-2">
                {{$product->name}}
            </h5>

            <div class="rateYo mx-auto text-center"
                 data-rateyo-read-only="true"
                 data-rateyo-rating="3"></div>
            <div class="text-center">
                <p class="text-center m-0 text-muted font-italic text-truncate">
                    {{$product->category? $product->category->name: "No Category"}}
                </p>
            </div>
            <div class="text-center my-1">
                <span class="badge badge-primary badge-pill">
                    Price: {{$product->selling_price}}
                </span>
                <span class="badge badge-danger badge-pill">
                    Discount: {{$product->discount}}
                </span>
            </div>
            <div>
                <p class="text-truncate">
                    {{$product->description}}
                </p>
            </div>
            <div class="text-center">
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="product" value="{{$product->id}}">
                    <button type="submit" class="btn btn-success btn-block btn-sm">Add to Cart</button>
                </form>
                <a href="#" class="text-muted"
                   style="font-size: 14px; outline: none; text-decoration: none;">
                    Display Info
                </a>
            </div>
        </div>
    </div>
</div>