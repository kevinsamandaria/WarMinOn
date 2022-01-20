@extends('layout.master')

@section('content')
<div class="container-md">
    @if($user->isEmpty())
        <p class="d-flex justify-content-center text-danger fs-4">No data</p>
    @else
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">User</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr class="table-primary">
                        <th class="col-5">User ID</th>
                        <th class="col-3">Username</th>
                        <th class="col-2">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $u)
                    <tr>
                        <td class="col-5">{{$u->id}}</td>
                        <td class="col-2">{{$u->name}}</td>
                        <td class="col">
                            <form action="/userDelete" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            <input type="hidden" value="{{$u->id}}" name="id">
                        </form>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>
            {{$user->links()}}
        </div>
    </div>
   @endif
</div>
@endsection
