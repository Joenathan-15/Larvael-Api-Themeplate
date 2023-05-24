<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        $employees = $employees->where("deleted_at",'=', null);
        return response()->json($employees);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'age' => 'required',
            'hobby' => 'required',
        ]);
        $employee = new Employee;
        $employee = $employee->store($request);
        return response()->json($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employee = Employee::all();
        $employee = $employee->where('id','=', $id);
        return response()->json($employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validated = Request()->validate([
            'name' => 'required',
            'age' => 'required',
            'hobby' => 'required',
        ]);
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->age = $request->age;
        $employee->hobby = $request->hobby;
        $employee->save();
        return response()->json($request);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee,$id)
    {
        $employee->find($id)->delete();
        $status = array(
            'status' => 'successful',
            'message' => 'Data has been deleted',
        );
        return response()->json($status);
    }
}
