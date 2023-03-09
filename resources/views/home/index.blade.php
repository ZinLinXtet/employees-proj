@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <h1>Dashboard</h1>
            <p>Only Authenticated users can access this section</p>

            @can('isAdmin')
                <a href="" class="btn btn-outline-primary">Admin Access</a>
            @elsecan('isManager')
                <a href="" class="btn btn-outline-primary">Manager Access</a>
            @elsecan('isBranchManager')
                <a href="" class="btn btn-outline-primary">Branch Manager Access</a>
            @else
                <a href="" class="btn btn-outline-primary">Employee Access</a>
            @endcan
        @endauth

        @guest
            <h2>Home Page</h2>
            <p>Your are in home page</p>
            @endguest
    </div>

@endsection
