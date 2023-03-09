@extends('layouts.app-master')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-md-12 ms-auto my-3">
                    <a href="{{ route('branch.index') }}" class="btn btn-outline-primary float-end">Back</a>
                </div>
            </div>

            <h1 class="h3 mb-3"><strong>{{ $branches->branch_name }}'s</strong> Information</h1>

            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li>Branch Name : {{ $branches->branch_name }}</li>
                    </ul>
                </div>

            </div>



        </div>
    </main>

@endsection
