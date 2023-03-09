@extends('layouts.app-master')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>{{ $branches->branch_name }}'s</strong> Information Editing</h1>

            <div class="row">
                <div class="col-md-12 ms-auto my-3">
                    <a href="{{ route('branch.index') }}" class="btn btn-outline-primary float-end">Back</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{--                    @if($errors->any())--}}
                    {{--                        @foreach($errors->all() as $message)--}}
                    {{--                            <p class="text-danger">{{ $message }}</p>--}}
                    {{--                        @endforeach--}}
                    {{--                    @endif--}}

                    <form action="{{ route('branch.update',$branches->id) }}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Branch Name</label>
                                    <input type="text" name="branch_name" id="" class="form-control" value="{{ $branches->branch_name }}">
                                    @error('branch_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-outline-primary float-end">Update</button>
                                </div>

                            </div>
                            <div class="col-md-3"></div>

                        </div>
                    </form>

                </div>

            </div>



        </div>
    </main>

@endsection
