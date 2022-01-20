@extends('layout.master')

@section('content')
<div class="d-flex">
    <div class="col-5 d-flex justify-content-center">
        <img src="{{asset('storage/'.$product->image)}}" class="rounded mx-auto d-block" alt="..." width="360px" height="360px">
    </div>

    <div class="col-7">
        <h1 class="display-5">{{$product->nama}}</h1>

        <h5>Stock:</h5>
        <p>{{$product->detail->stock}}</p>
        <h5>Price:</h5>
        <p> {{$product->detail->Price}}</p>
        <div class="card w-75">
            <div class="card-header">
                    Detail Product
            </div>
            <div class="card-body">
                <p class="card-text">{{$product->detail->desc}}</p>
            </div>
        </div>
        @auth
            @if (auth()->user()->role == 1)
                <form action="/cart" method="post">
                @csrf
                    <h4 class="fw-normal mt-5">Add To Chart</h4>
                    <div class="form-floating mb-3 w-75">
                        <input type="text" class="form-control @error('quantity') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="quantity">
                        <label for="floatingInput">Quantity</label>
                    @error('quantity')
                        <div class="invalid-feedback m-1">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="d-grid gap-2 d-md-block mx-auto">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                    <input type="hidden" value="{{$product->id}}" name="id">
                </form>

            @endif
        @endauth
    </div>
</div>
@endsection
