<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Consultation;
use Session;

class ConsultationController extends Controller
{
    // Consultation History
    public function index($patient_id){
        $patient = Patient::whereId($patient_id)->first();
        $consultations = $patient->consultations()->latest()->get();

        return view('consultation.index', compact('consultations'));
    }

    public function show($id){
        $consultation = Consultation::whereId($id)->first();

        return view('consultation.show', compact('consultation'));
    }

    public function form($patient_uuid){
        $patient = Patient::whereUuid($patient_uuid)->first();
        return view('consultation.form', compact('patient'));
    }

    public function addConsultation(Request $request){
        $patient_id = $request->query('patient_id');
        $patient = null;

        if($patient_id){
            $patient = Patient::where('hospital_no', $patient_id)->first();

            if(!$patient){
                // dd("here");
                Session::flash('error_message', "Patient Not Found!");
                return view('consultation.add',compact('patient', 'patient_id'));
            }
        }

        return view('consultation.add',compact('patient', 'patient_id'));
    }

    public function storeConsultation(Request $request, $patient_uuid)
    {
        $patient = Patient::whereUuid($patient_uuid)->first();
        $request->validate([
            'general_physical_examination'       =>  ['required'],
            'central_nervous_system_examination' =>  ['sometimes','nullable'],
            'cardiovascular_system_examination'  =>  ['sometimes','nullable'],
            'respiratory_system_examination'     =>  ['sometimes','nullable'],
            'digestive_system_examination'       =>  ['sometimes','nullable'],
            'ear_nose_and_throat_examination'    =>  ['sometimes','nullable'],
            'musculoskeletal_system_examination' =>  ['sometimes','nullable'],
            'skin_examination'       =>  ['sometimes','nullable'],
            'follow_up_appointment'  =>  ['sometimes','nullable'],
            'comment'                =>  ['sometimes','nullable'],
            'others'                 =>  ['sometimes','nullable'],
            'weight'                 =>  ['sometimes','nullable'],
            'height'                 =>  ['sometimes','nullable'],
            'bmi'                    =>  ['sometimes','nullable'],
            'temperature'            =>  ['sometimes','nullable'],
            'blood_pressure'         =>  ['sometimes','nullable'],
            'pulse_rate'             =>  ['sometimes','nullable'],
            'oxygen_saturation'      =>  ['sometimes','nullable'],
            'pain_score'             =>  ['sometimes','nullable'],
            'findings'               =>  ['required'],
            'provisional_diagnosis'  =>  ['required'],
            'treatment_plan'         =>  ['required'],
            'cost_of_consultation'   =>  ['required'],

        ]);

        $consultation = Consultation::create([
            'patient_id' => $patient->id,
            'general_physical_examination'       =>  $request->general_physical_examination,
            'central_nervous_system_examination' =>  $request->central_nervous_system_examination,
            'cardiovascular_system_examination'  =>  $request->cardiovascular_system_examination,
            'respiratory_system_examination'     =>  $request->respiratory_system_examination,
            'digestive_system_examination'       =>  $request->digestive_system_examination,
            'ear_nose_and_throat_examination'    =>  $request->ear_nose_and_throat_examination,
            'musculoskeletal_system_examination' =>  $request->musculoskeletal_system_examination,
            'skin_examination'       =>  $request->skin_examination,
            'follow_up_appointment'  =>  $request->follow_up_appointment,
            'comment'                =>  $request->comment,
            'others'                 =>  $request->others,
            'weight'                 =>  $request->weight,
            'height'                 =>  $request->height,
            'bmi'                    =>  $request->bmi,
            'temperature'            =>  $request->temperature,
            'blood_pressure'         =>  $request->blood_pressure,
            'pulse_rate'             =>  $request->pulse_rate,
            'oxygen_saturation'      =>  $request->oxygen_saturation,
            'pain_score'             =>  $request->pain_score,
            'findings'               =>  $request->findings,
            'provisional_diagnosis'  =>  $request->provisional_diagnosis,
            'treatment_plan'         =>  $request->treatment_plan,
            'cost_of_consultation'   =>  $request->cost_of_consultation,
        ]);

        return redirect()->back()->with('flash_message', "Consultation Added!");
        // return view('consultation.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consultation = Consultation::whereId($id)->first();
        return view('consultation.edit', compact('consultation'));
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
        $consultation = COnsultation::whereId($id)->first();

        $request->validate([
            'general_physical_examination'       =>  ['required'],
            'central_nervous_system_examination' =>  ['sometimes','nullable'],
            'cardiovascular_system_examination'  =>  ['sometimes','nullable'],
            'respiratory_system_examination'     =>  ['sometimes','nullable'],
            'digestive_system_examination'       =>  ['sometimes','nullable'],
            'ear_nose_and_throat_examination'    =>  ['sometimes','nullable'],
            'musculoskeletal_system_examination' =>  ['sometimes','nullable'],
            'skin_examination'       =>  ['sometimes','nullable'],
            'follow_up_appointment'  =>  ['sometimes','nullable'],
            'comment'                =>  ['sometimes','nullable'],
            'others'                 =>  ['sometimes','nullable'],
            'weight'                 =>  ['sometimes','nullable'],
            'height'                 =>  ['sometimes','nullable'],
            'bmi'                    =>  ['sometimes','nullable'],
            'temperature'            =>  ['sometimes','nullable'],
            'blood_pressure'         =>  ['sometimes','nullable'],
            'pulse_rate'             =>  ['sometimes','nullable'],
            'oxygen_saturation'      =>  ['sometimes','nullable'],
            'pain_score'             =>  ['sometimes','nullable'],
            'findings'               =>  ['required'],
            'provisional_diagnosis'  =>  ['required'],
            'treatment_plan'         =>  ['required'],
            'cost_of_consultation'   =>  ['required'],

        ]);

        $consultation->update([
            'general_physical_examination'       =>  $request->general_physical_examination,
            'central_nervous_system_examination' =>  $request->central_nervous_system_examination,
            'cardiovascular_system_examination'  =>  $request->cardiovascular_system_examination,
            'respiratory_system_examination'     =>  $request->respiratory_system_examination,
            'digestive_system_examination'       =>  $request->digestive_system_examination,
            'ear_nose_and_throat_examination'    =>  $request->ear_nose_and_throat_examination,
            'musculoskeletal_system_examination' =>  $request->musculoskeletal_system_examination,
            'skin_examination'       =>  $request->skin_examination,
            'follow_up_appointment'  =>  $request->follow_up_appointment,
            'comment'                =>  $request->comment,
            'others'                 =>  $request->others,
            'weight'                 =>  $request->weight,
            'height'                 =>  $request->height,
            'bmi'                    =>  $request->bmi,
            'temperature'            =>  $request->temperature,
            'blood_pressure'         =>  $request->blood_pressure,
            'pulse_rate'             =>  $request->pulse_rate,
            'oxygen_saturation'      =>  $request->oxygen_saturation,
            'pain_score'             =>  $request->pain_score,
            'findings'               =>  $request->findings,
            'provisional_diagnosis'  =>  $request->provisional_diagnosis,
            'treatment_plan'         =>  $request->treatment_plan,
            'cost_of_consultation'   =>  $request->cost_of_consultation,
        ]);

        return redirect()->back()->with('flash_message', "Consultation Updated!");

    }

}
