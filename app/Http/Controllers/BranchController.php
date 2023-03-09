<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branch = DB::table('branches')->get();
        return view('branch.index',['branches'=>$branch]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('branch.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'branch_name'=>'required'
        ]);

        DB::table('branches')->insert([
            'branch_name'=>$request->branch_name
        ]);
        return redirect()->route('branch.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $branch= DB::table('branches')->find($id);
        return view('branch.view',['branches'=>$branch]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $branch=DB::table('branches')->find($id);
        return view('branch.edit',['branches'=>$branch]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'branch_name'=>'required'
        ]);
//        dd($request->all());
        $product =  Branch::find($id);
        $product->branch_name = $request->input('branch_name');
        $product->save();
        return redirect()->route('branch.index')->with('update','Product has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Branch::find($id);
        $product->delete();
        return redirect()->route('branch.index');
    }
}
