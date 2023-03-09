@extends('layouts.app-master')

@section('content')
    @auth
        <h3 class="mt-3"></h3>

        <a href="{{ route('employee.index') }}" class="btn btn-dark float-end">Back</a>

        <div class="card p-3 w-50 mx-auto mt-3">
            <div class="card-title">Employee Info</div>
            <div class="card-content">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6">
                        <h3>Name: {{ $employee->name }}</h3>
                        <p>Email : {{ $employee->email }}</p>
                        <p>Role : {{ $employee->role }}</p>
                    </div>
                        @foreach($branch as $value)
                        @if($value->id == $employee->branch_id)
                        <p>Branch: {{ $value->branch_name }}</p>

                        @endif
                        @endforeach
                </div>
                <div class="col-3"></div>

            </div>
        </div>
    @endauth
@endsection
