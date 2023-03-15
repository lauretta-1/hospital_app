<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Carbon\Carbon;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::latest()->get();
        return view('patient.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'hospital_no'       =>  ['required'],
            'first_name'        =>  ['required'],
            'last_name'         =>  ['required'],
            'gender'            =>  ['required'],
            'marital_status'    =>  ['required'],
            'dob'               =>  ['required', 'before:today'],
            'email'             =>  ['required', 'email', 'unique:patients'],
            'phone'             =>  ['required', 'numeric', 'unique:patients'],
            'next_of_kin_name'  =>  ['required'],
            'next_of_kin_phone' =>  ['required'],
            'address'           =>  ['required'],
            'photo'             =>  ['required','mimes:jpg,png,jpeg','max:1024'],
        ]);

        $dob =  Carbon::createFromFormat('d/m/Y', $request->dob)->format('d-m-Y');
        $years = Carbon::parse($dob)->age;
        // dd($years);

        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $image_name  = $request['photo']->getClientOriginalName();

            $image->move(public_path('patient_photo/'), $image_name);
        }

        $patient = Patient::create([
            'hospital_no'       =>  $request->hospital_no,
            'first_name'        =>  $request->first_name,
            'last_name'         =>  $request->last_name,
            'gender'            =>  $request->gender,
            'marital_status'    =>  $request->marital_status,
            'dob'               =>  date('Y-m-d', strtotime($request->dob)),
            'email'             =>  $request->email,
            'phone'             =>  $request->phone,
            'next_of_kin_name'  =>  $request->next_of_kin_name,
            'next_of_kin_phone' =>  $request->next_of_kin_phone,
            'address'           =>  $request->address,
            'photo'             =>  $image_name,
            'age'               =>  $years
        ]);

        return redirect()->route('patients.index')->with('flash_message', 'Patient Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::whereUuid($id)->first();
        return view('patient.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $patient = Patient::whereUuid($id)->first();

        $request->validate([
            'hospital_no'       =>  ['required'],
            'first_name'        =>  ['required'],
            'last_name'         =>  ['required'],
            'gender'            =>  ['sometimes'],
            'marital_status'    =>  ['sometimes'],
            'email'             =>  ['required', 'email', 'unique:patients,email,'. $patient->id.',id'],
            'phone'             =>  ['required', 'numeric', 'unique:patients,phone,'. $patient->id.',id'],
            'next_of_kin_name'  =>  ['required'],
            'next_of_kin_phone' =>  ['required'],
            'address'           =>  ['required'],
            'photo'             =>  ['sometimes'],
        ]);

        if($request->hasFile('photo')){
            unlink(public_path('patient_photo/'. $patient->photo));

            $image = $request->file('photo');
            $image_name  = $request['photo']->getClientOriginalName();

            $image->move(public_path('patient_photo/'), $image_name);
        }else{
            $image_name = $patient->photo;
        }

        $patient->update([
            'hospital_no'       =>  $request->hospital_no,
            'first_name'        =>  $request->first_name,
            'last_name'         =>  $request->last_name,
            'marital_status'    =>  $request->marital_status,
            'email'             =>  $request->email,
            'phone'             =>  $request->phone,
            'next_of_kin_name'  =>  $request->next_of_kin_name,
            'next_of_kin_phone' =>  $request->next_of_kin_phone,
            'address'           =>  $request->address,
            'photo'             =>  $image_name,
        ]);

        return redirect()->route('patients.index')->with('flash_message', 'Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
