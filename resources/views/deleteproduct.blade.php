@extends('layout.master')

@section('content')
<div class="container-md">
    <h3>Delete Product</h3>

    @if($product->isEmpty())
        <p class="d-flex justify-content-center text-danger fs-4">No data</p>
    @else
        <table class="table table-bordered table-hover border border-secondary">
            <thead>
                <tr class="table-primary border border-secondary">
                    <th class="col-5">Product</th>
                    <th class="col-2">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product as $p)
                <tr>
                    <td class="col-5">{{$p->nama}}</td>
                    <td class="col">
                        <form action="/delete" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        <input type="hidden" value="{{$p->id}}" name="id">
                    </form>
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
   @endif
</div>
@endsection
