@extends('layout.master')

@section('content')
<div class="row row-cols-1 row-cols-md-3 g-4 mx-auto">
    @foreach ($product as $p)
    <div class="col">
        <div class="card mx-auto" style="width: 18rem; height:32rem">
            <img src="{{ asset('/storage/'.$p->image) }}" class="card-img-top" alt="...">
            <div class="card-body align-text-bottom">
                <h5 class="card-title">{{$p->nama}}</h5>
                <p class="card-text">{{$p->detail->desc}}</p>
                <div class="d-grid gap-2 mb-4 col-10 mx-auto position-absolute bottom-0 start-50 translate-middle-x">
                    @auth
                        @if (auth()->user()->role == 2)
                            <a href="/update/{{$p->id}}" class="btn btn-danger">Update Product</a>
                        @endif
                    @endauth
                    <a href="/details/{{$p->id}}" class="btn btn-primary">Show Detail</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="d-flex justify-content-center my-5">
    {{$product->links()}}
</div>
@endsection
