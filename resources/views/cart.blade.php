@extends('layout.master')

@section('content')
<div class="container-md">
    <h3>Cart</h3>
    @if($cart->isEmpty())
        <p class="d-flex justify-content-center text-danger fs-4">No data</p>
    @else
        <table class="table table-bordered table-hover border border-secondary">
            <thead>
                <tr class="table-primary border border-secondary">
                    <th class="col-5">Item Name</th>
                    <th class="col-3">Price</th>
                    <th class="col">Quantity</th>
                    <th class="col">Sub Total</th>
                    <th class="col-2">Delete</th>
                </tr>
            </thead>
            <tbody>
            @php
            $total = 0;
            @endphp
            
                @foreach($cart as $c)
                <tr>
                    <td class="col-5">{{ $c->itemName }}</td>
                    <td class="col-2">{{ $c->price }}</td>
                    <td class="col-2">{{ $c->quantity }}</td>
                    <td class="col-2">{{ $c->subtotal }}</td>
                    <td class="col">
                        <form action="/cartDelete" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        <input type="hidden" value="{{$c->id}}" name="id">
                        <input type="hidden" value="{{$c->itemName}}" name="name">
                    </form>
                </td>
            </tr>
                @php
                $total += $c->subtotal;
                @endphp

                @endforeach
            </tbody>
        </table>
        <form action="/transaction" method="post">
            @csrf
            
            <h6>Grand Total:{{$total}}</h6>
            <button type="submit" class="btn btn-success">Check out</button>
        </form>
    @endif
</div>

@endsection
