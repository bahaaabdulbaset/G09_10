@if($errors->any())
    <div class="card shadow mb-3">
        <div class="card-body">
            <ul class="list-unstyled mb-0">
                @foreach($errors->all() as $error)
                    <li class="text-danger">
                        <i class="fa fa-caret-right"></i>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif