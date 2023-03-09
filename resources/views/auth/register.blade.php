@extends('layouts.auth-master')

@section('content')
    <h1 class="mt-5">Register</h1>
    <form action="{{ route('register.registration') }}" method="post">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <input type="email" name="email" id="" class="form-control" placeholder="example@gmail.com" required>
                        @if($errors->has('email'))
                            <span class="text-danger">{{$errors->first('email')}}</span>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <input type="text" name="name" id="" class="form-control" placeholder="Username" required>
                        @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <input type="password" name="password" id="" class="form-control" placeholder="Password" required>
                        @if($errors->has('password'))
                            <span class="text-danger">{{$errors->first('password')}}</span>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <input type="password" name="password-confirmation" id="" class="form-control" placeholder="Confirm Password" required>
                        @if($errors->has('password-confirmation'))
                            <span class="text-danger">{{$errors->first('password-confirmation')}}</span>
                        @endif
                    </div>

                    <button type="submit" class="w-100 btn-lg btn-primary">Register</button>


                </div>
                <div class="col-md-3"></div>
            </div>
        </div>


    </form>
@endsection
