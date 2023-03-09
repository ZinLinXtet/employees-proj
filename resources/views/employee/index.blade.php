@extends('layouts.app-master')

@section('content')
    @auth
        @can('isAdmin')
        <a href="{{ route('employee.create') }}" class="btn btn-success mt-3">Create New Employee</a>
        @elsecan('isManager')
            <a href="{{ route('employee.create') }}" class="btn btn-success mt-3">Create New Employee</a>
        @elsecan('isBranchManager')
            <a href="{{ route('employee.create') }}" class="btn btn-success mt-3">Create New Employee</a>
        @endcan
            <h3 class="mt-3">Employee</h3>

        <table class="table table-striped mt-3 text-center">
            <thead class="bg-black text-white">
                <th>Id</th>
                <th>Emplpyee Name</th>
                <th>Branch</th>
                <th>Action</th>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <form action="{{ route('employee.destroy',$employee->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $employee->name }}</td>
                        @foreach ($branches as $i)
                            @if ($employee->branch_id == $i->id)
                                <td>{{$i->branch_name}}</td>
                            @endif
                        @endforeach
                        @can('isAdmin')
                            <td><a href="{{ route('employee.show',$employee->id) }}" class="btn btn-outline-info">View</a>
                                <a href="{{ route('employee.edit',$employee->id) }}" class="btn btn-outline-warning">Edit</a>
                                <button class="btn btn-outline-danger">Delete</button>
                            </td>
                        @elsecan('isManager')
                            <td><a href="{{ route('employee.show',$employee->id) }}" class="btn btn-outline-info">View</a>
                                <a href="{{ route('employee.edit',$employee->id) }}" class="btn btn-outline-warning">Edit</a>
                            </td>
                        @elsecan('isBranchManager')
                            <td><a href="{{ route('employee.show',$employee->id) }}" class="btn btn-outline-info">View</a>
                                <a href="{{ route('employee.edit',$employee->id) }}" class="btn btn-outline-warning">Edit</a>
                            </td>
                        @else
                            <td><a href="{{ route('employee.show',$employee->id) }}" class="btn btn-outline-info">View</a>
                            </td>
                        @endcan


                    </tr>
                </form>

            @endforeach


            </tbody>
        </table>
    @endauth
@endsection
