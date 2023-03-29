@extends('layouts.master')
@section('content')
    <a href="#default-tab-2" data-bs-toggle="tab" title="Back" class="nav-link" data-url="{{route('consultations.index', $consultation->patient_id)}}">
        <button class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
    </a>
    <br>
    <div class="table-responsive">
        <table class="table">
            <thead><h4 class="text-center">VITALS</h4></thead>
            <tbody>
                <tr><th> Weight </th><td> {{ isset($consultation->weight) ? $consultation->weight : 'Nil' }} </td></tr>
                <tr><th> Height </th><td> {{ isset($consultation->height) ? $consultation->height : 'Nil' }} </td></tr>
                <tr><th> BMI </th><td> {{ isset($consultation->bmi) ? $consultation->bmi : 'Nil' }} </td></tr>
                <tr><th> Temperature </th><td> {{ isset($consultation->temperature) ? $consultation->temperature : 'Nil' }} </td></tr>
                <tr><th> Blood Pressure </th><td> {{ isset($consultation->blood_pressure) ? $consultation->blood_pressure : 'Nil' }} </td></tr>
                <tr><th> Pulse Rate </th><td> {{ isset($consultation->pulse_rate) ? $consultation->pulse_rate : 'Nil' }} </td></tr>
                <tr><th> Oxygen Saturation </th><td> {{ isset($consultation->oxygen_saturation) ? $consultation->oxygen_saturation : 'Nil' }} </td></tr>
                <tr><th> Pain Score </th><td> {{ isset($consultation->pain_score) ? $consultation->pain_score : 'Nil' }} </td></tr>
            </tbody>
        </table>
        <table class="table">
            <thead><h4 class="text-center">HISTORY</h4></thead>
            <tbody>
                <tr><th> History of Complaints </th><td> {{ isset($consultation->complaints_history) ? $consultation->complaints_history : 'Nil' }} </td></tr>
                <tr><th> Review of Systems </th><td> {{ isset($consultation->review_of_systems) ? $consultation->review_of_systems : 'Nil' }} </td></tr>
                <tr><th> Medical and Surgical History </th><td> {{ isset($consultation->medical_and_surgical_history) ? $consultation->medical_and_surgical_history : 'Nil' }} </td></tr>
                <tr><th> Drug and Allergy History </th><td> {{ isset($consultation->drug_and_allergy_history) ? $consultation->drug_and_allergy_history : 'Nil' }} </td></tr>
                <tr><th> Obstetrics and Gynecological History </th><td> {{ isset($consultation->obstetrics_and_gynecological_history) ? $consultation->obstetrics_and_gynecological_history : 'Nil' }} </td></tr>
                <tr><th> Developmental History </th><td> {{ isset($consultation->developmental_history) ? $consultation->developmental_history : 'Nil' }} </td></tr>
                <tr><th> Immunization History </th><td> {{ isset($consultation->immunization_history) ? $consultation->immunization_history : 'Nil' }} </td></tr>
                <tr><th> Nutritional History </th><td> {{ isset($consultation->nutritional_history) ? $consultation->nutritional_history : 'Nil' }} </td></tr>
                <tr><th> Family and Social History </th><td> {{ isset($consultation->family_and_social_history) ? $consultation->family_and_social_history : 'Nil' }} </td></tr>
                <tr><th> Spirituality </th><td> {{ isset($consultation->spirituality) ? $consultation->spirituality : 'Nil' }} </td></tr>
            </tbody>
        </table>
        <table class="table">
            <thead><h4 class="text-center">EXAMINATIONS</h4></thead>
            <tbody>
                <tr><th> General Physical Examination </th><td> {{ isset($consultation->general_physical_examination) ? $consultation->general_physical_examination : 'Nil' }}</td></tr>
                <tr><th> Central Nervous System Examination </th><td> {{ isset($consultation->central_nervous_system_examination) ? $consultation->central_nervous_system_examination : 'Nil' }} </td></tr>
                <tr><th> Cardiovascular System Examination </th><td> {{ isset($consultation->cardiovascular_system_examination) ? $consultation->cardiovascular_system_examination : 'Nil' }} </td></tr>
                <tr><th> Respiratory System Examination </th><td> {{ isset($consultation->respiratory_system_examination) ? $consultation->respiratory_system_examination : 'Nil' }} </td></tr>
                <tr><th> Digestive System Examination </th><td> {{ isset($consultation->digestive_system_examination) ? $consultation->digestive_system_examination : 'Nil' }} </td></tr>
                <tr><th> Ear, Nose and Throat Examination </th><td> {{ isset($consultation->ear_nose_and_throat_examination) ? $consultation->ear_nose_and_throat_examination : 'Nil' }} </td></tr>
                <tr><th> Musculoskeletal System Examination </th><td> {{ isset($consultation->musculoskeletal_system_examination) ? $consultation->musculoskeletal_system_examination : 'Nil' }} </td></tr>
                <tr><th> Skin Examination </th><td> {{ isset($consultation->skin_examination) ? $consultation->skin_examination : 'Nil' }} </td></tr>
                <tr><th> Findings </th><td> {{ isset($consultation->findings) ? $consultation->findings : 'Nil' }} </td></tr>
                <tr><th> Provisional Diagnosis </th><td> {{ isset($consultation->provisional_diagnosis) ? $consultation->provisional_diagnosis : 'Nil' }} </td></tr>
                <tr><th> Treatment Plan </th><td> {{ isset($consultation->treatment_plan) ? $consultation->treatment_plan : 'Nil' }} </td></tr>
                <tr><th> Follow-Up Appointment </th><td> {{ isset($consultation->follow_up_appointment) ? $consultation->follow_up_appointment : 'Nil' }} </td></tr>
                <tr><th> <span style="color: red;">Cost Of Consultation </span></th><td> <span style="color: red;">&#8358;{{ isset($consultation->cost_of_consultation) ? number_format($consultation->cost_of_consultation) : 'Nil' }} </span></td></tr>
                <tr><th> Comment </th><td> {{ isset($consultation->comment) ? $consultation->comment : 'Nil' }} </td></tr>
                <tr><th> Others </th><td> {{ isset($consultation->others) ? $consultation->others : 'Nil' }} </td></tr>
                <tr><th> <span style="color: red;">Date </span></th><td><span style="color: red;">{{$consultation->created_at}} </span></td></tr>
            </tbody>
        </table>


    </div>
@endsection
