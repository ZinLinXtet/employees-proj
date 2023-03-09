@extends('layouts.auth-master')
@section('content')
    <form method="post" action="{{ route('login.loginUser') }}">
        @csrf
        <h1 class="mt-5">Login User</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <input type="text" name="name" id="" class="form-control" required placeholder="Username">
                    </div>

                    <div class="form-group mb-3">
                        <input type="password" name="password" id="" class="form-control" required placeholder="Password">
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>

    </form>

@endsection
