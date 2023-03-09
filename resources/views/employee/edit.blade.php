@extends('layouts.app-master')

@section('content')
    @auth
        <h3 class="mt-3">Edit Employee</h3>

        <a href="{{ route('employee.index') }}" class="btn btn-dark float-end">Back</a>

        <div class="card p-3 w-50 mx-auto mt-3">
            <div class="card-content">
                <form action="{{ route('employee.update', $employee->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Employee Name</label>
                        <input type="text" name="name" id=""
                            class="form-control @if ($errors->has('name')) border border-danger @endif"
                            placeholder="Enter Employee Name" value="{{ $employee->name }}">
                        @if ($errors->has('name'))
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" name="email" id=""
                               class="form-control @if ($errors->has('email')) border border-danger @endif"
                               placeholder="Enter Employee Email" value="{{ $employee->email }}">
                        @if ($errors->has('email'))
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        @endif
                    </div>

                @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Manager')
                        <div class="form-group">
                            <label for="" class="form-label">Branch Name</label>
                            <select name="branch_id" id="" class="form-select mb-3">
                                <option value="0">Choose Branch</option>
                            @foreach($branches as $branch)
                                @if($employee->branch_id == $branch->id)
                                        <option value="{{ $branch->id }}" selected>{{ $branch->branch_name }}</option>
                                @elseif($employee->branch_id != $branch->id)
                                    <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                    @endif

                                @endforeach
                            </select>
                        </div>
                    @else
                        <input type="text" name="branch_id" id="" value="{{ auth()->user()->branch_id }}" hidden>
                    @endif
                    <button type="submit" class="btn btn-success w-100">Edit</button>
                </form>
            </div>
        </div>
    @endauth
@endsection
