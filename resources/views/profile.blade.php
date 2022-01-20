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
            Update Profile
        </div>
        <div class="card-body d-flex justify-content-center ">
            <form action="/profile" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation">
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="disabledSelect" class="form-label">Gender</label>
                    <select class="form-select @error('gender') is-invalid @enderror" name="gender">
                        <option value="Male" @if(auth()->user()->gender == "Female") selected @endif>Male</option>
                        <option value="Female" @if(auth()->user()->gender == "Female") selected @endif>Female</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Update Profile</button>
            </form>
        </div>
    </div>

</div>
@endsection
