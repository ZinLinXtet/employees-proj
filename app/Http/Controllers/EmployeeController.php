<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=User::where('role','Employee')->get();
        $branches=Branch::get();
        if(Auth::user()->role == 'Branch Manager'){
            $employees = User::where('branch_id',Auth::user()->branch_id)->where('role','Employee')->get();
            return view('employee.index',['employees'=>$employees,'branches'=>$branches]);
        }
        elseif(Auth::user()->role == 'Employee')
        {
            $employees=User::where('id',Auth::user()->id)->get();
            $branches=Branch::get();
            return view('employee.index',['employees'=>$employees,'branches'=>$branches]);

        }
        else{
            $employees=User::where('role','Employee')->get();
            $branches=Branch::get();
            return view('employee.index',['employees'=>$employees,'branches'=>$branches]);

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create')->with(['branches' => Branch::get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            "email" => "required|unique:users,email",
            "name" => "required|unique:users,name"
        ]);
        $user = User::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make('123456'),
            'branch_id' =>$request->branch_id,
            'role' => 'Employee'

        ]);
        return redirect()->route('employee.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $employee = User::find($id);
        $branch_id = $employee->branch_id;
        return view('employee.show',['employee'=>$employee,'branch'=>Branch::get()]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = User::find($id);
        $branch_id = $employee->branch_id;
        return view('employee.edit',['employee'=>$employee,'branches'=>Branch::get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "email" => "required",
            "name" => "required"
        ]);
        if(Auth::user()->role == 'Branch Manager'){
            $employee =  User::find($id);
            $employee->name = $request->input('name');
            $employee->email = $request->input('email');
            $employee->save();
            return redirect()->route('employee.index')->with('update','Employee has been updated!');

        }
        else
        {
            $employee =  User::find($id);
            $employee->name = $request->input('name');
            $employee->email = $request->input('email');
            $employee->branch_id = $request->input('branch_id');
            $employee->save();
            return redirect()->route('employee.index')->with('update','Employee has been updated!');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);
        $user->delete();
        return redirect()->route('employee.index');
    }
}
