<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Storage;
use Auth;
use Mail;
use App\Mail\NotifyNewCompanyMail;

use App\Listeners\newCompanyHasCreated;
use App\Events\newCompanyHasCreatedEvent;

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

                $view_btn = '<a href="/company/'. $company->id .'" class="btn btn-sm btn-success mr-1">View</a>';
                $add_btn = '<a href="/company/'. $company->id .'/edit" class="btn btn-sm btn-primary mr-1">Edit</a>';
                $delete_btn = '<a href="/company/'. $company->id .'/delete" class="btn btn-sm btn-danger">Delete</a>';

                return   $view_btn . $add_btn . $delete_btn;
                
            })
            ->rawColumns(['actions'])
            ->toJson();

    }

    public function index()
    {   
        return view('sections.company.browse');
    }

    public function show(Company $company)
    {   
        return view('sections.company.read', compact('company'));
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

        if ($request->hasFile('logo')) {
            $data['logo'] = $this->saveLogo($data['logo']);
        } else {
            $data['logo'] = asset('default.png');
        }

        Company::create($data);

        Mail::to(auth::user()->email)->send(new NotifyNewCompanyMail());

        return redirect(route('company.index'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('sections.company.edit-add', compact('company'));
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

        if ($request->hasFile('logo')) {
            $data['logo'] = $this->saveLogo($data['logo']);
        }

        $company->update($data);

        return redirect(route('company.index'));

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

        return redirect(route('company.index'));
    }


    public function validateRequest(){

        return request()->validate([
            'name' => 'required',
            'logo' => 'file',
            'email' => 'required',
            'website' => 'required'
        ]);

    }

    public function saveLogo($file){

        $image = $file;
        $name = $file->getClientOriginalName() . today()->format('dmYHis');
        $destinationPath = public_path('/storage/company_logo');
        $imagePath = "/storage/company_logo/" .  $name;
        $image->move($destinationPath, $name);
        return $imagePath;

    }

}
