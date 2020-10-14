<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Storage;

class CampanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showAll(){

        $companies = Company::query();

        return DataTables::eloquent($companies)
            ->addColumn('actions', function($company) {

                $add_btn = '<a href="/company/'. $company->id .'/edit" class="btn btn-sm btn-primary mr-1">Edit</a>';
                $delete_btn = '<a href="/company/'. $company->id .'/delete" class="btn btn-sm btn-danger">Delete</a>';

                return   $add_btn . $delete_btn;
                
            })
            ->rawColumns(['actions'])
            ->toJson();

    }

    public function index()
    {   
        return view('sections.company.browse');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sections.company.edit-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $this->validateRequest();
        
        $data['logo'] = $data['logo']->getClientOriginalName() . today()->format('dmYHis');

        Storage::disk('local')->put('company_logo/' . $data['logo'], $request->logo);

        Company::create($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {

        $data = $this->validateRequest();

        $company->update($data);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        Storage::delete('company_logo/'.$company->logo);
        $company->delete();
    }


    public function validateRequest(){

        return request()->validate([
            'logo' => 'required',
            'name' => 'required',
            'email' => 'required',
            'website' => 'required'
        ]);

    }

}
