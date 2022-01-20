@extends('layout.master')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card w-50">

        @if(session()->has('updated'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('updated')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card-header">
            Update Product
        </div>
        <div class="card-body d-flex justify-content-center ">
            <form action="/update" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Category</label>
                    <select id="disabledSelect" class="form-select" aria-label="Default select example" style="width: 110px" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" @if($product->category_id == $category->id) selected @endif>{{$category->categories}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Title</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $product->nama }}">
                    @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control @error('desc') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="desc">{{ $product->detail->desc }}</textarea>
                    @error('desc')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Price</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->detail->Price }}">
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">stock</label>
                    <input type="text" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ $product->detail->stock }}">
                    @error('stock')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
                    @error('image')
                        <div class="invalid-feedback m-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <input type="hidden" value="{{$product->id}}" name="id">
                <button type="submit" class="btn btn-success">Update Item</button>
            </form>
        </div>
    </div>
</div>
@endsection
