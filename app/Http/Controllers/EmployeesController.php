<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use DataTables;
use DB;

class EmployeesController extends Controller
{

    public function showAll(){

        $employees = Employee::query();

        return DataTables::eloquent($employees)
            ->addColumn('company', function ($employee) {
                return $employee->company->name;
            })
            ->addColumn('actions', function($employee) {

                $add_btn = '<a href="/employee/'. $employee->id .'/edit" class="btn btn-sm btn-primary mr-1">Edit</a>';
                $delete_btn = '<a href="/employee/'. $employee->id .'/delete" class="btn btn-sm btn-danger">Delete</a>';

                return  $add_btn . $delete_btn;
                
            })
            ->rawColumns(['actions'])
            ->toJson();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('sections.employee.browse');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
