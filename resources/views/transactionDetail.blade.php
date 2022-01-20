@extends('layout.master')

@section('content')
<div class="container-md">
    <h3>Transaction Detail</h3>
    @if($detail->isEmpty())
    <p class="d-flex justify-content-center text-danger fs-4">No data</p>
    @else
    <table class="table table-bordered table-hover border border-secondary">
        <thead>
            <tr class="table-primary border border-secondary">
                <th class="col-3">Name</th>
                <th class="col-5">Item Detail</th>
                <th class="col">Price</th>
                <th class="col">Quantity</th>
                <th class="col-2">Sub Total</th>
            </tr>
        </thead>
        <tbody>
        @php
        $total = 0;
        @endphp
            @foreach($detail as $d)
            <tr>
                <td class="col-3">{{ $d->ItemName }}</td>
                <td class="col-5">{{ $d->ItemDetail}}</td>
                <td class="col">{{ $d->price}}</td>
                <td class="col">{{ $d->quantity}}</td>
                <td class="col-2">{{ $d->total }}</td>
            </td>
        </tr>
        
        @php
        $total += $d->total
        @endphp
        
        @endforeach
    </tbody>
</table>
<h6>Grand Total: {{$total}}</h6>
        
@endif
</div>
@endsection
