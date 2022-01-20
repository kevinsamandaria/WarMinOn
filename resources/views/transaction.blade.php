@extends('layout.master')

@section('content')
<div class="container-md">
    <h3>Transaction</h3>
    @if($transaction->isEmpty())
        <p class="d-flex justify-content-center text-danger fs-4">No data</p>
    @else
        <table class="table table-bordered table-hover border border-secondary">
            <thead>
                <tr class="table-primary border border-secondary">
                    <th class="col-4">Transaction Time</th>
                    <th class="col-8">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaction as $t)
                <tr>
                    <td class="col">{{ $t->created_at }}</td>
                    <td class="col">
                        <form action="/transactionDetail" method="post">
                            @csrf
                            <button type="submit" class="btn btn-success">Check Detail</button>
                            <input type="hidden" value="{{$t->id}}" name="id">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
