@extends('layouts.master')
<div class="container">
    <div class="form-wrapper">
        <!-- Flash message -->
        @if($errors->all())
            <div class="alert alert-danger fs-4" role="alert">
                @foreach ($errors->all() as $message)
                    <div>
                        {{$message}}
                    </div>
                @endforeach
            </div>
        @endif
        
        @if (session()->has('flash_message'))
        <div class="alert alert-success">{{ \Session::get('flash_message') }}</div>
        @endif
        {{-- End of Flash Message --}}

        {{-- <div class="form-group">
            <label for="name" class="control-label">{{ 'Consultant' }}</label>
            <input class="form-control" name="name" type="text" id="name" value="{{ isset($agent->name) ? $agent->name : 'Enter full name'}}">
        </div><br>
        <div class="form-group">
            <label for="name" class="control-label">{{ 'Specialty Unit' }}</label>
            <input class="form-control" name="name" type="text" id="name" value="{{ isset($agent->name) ? $agent->name : 'Enter full name'}}" required>
        </div><br> --}}
        <h4 style="padding:5px 2px 2px 10px;"> Patient Assessment </h4>
        <div class="col-md-9" style="margin-left:10px;">
            <form id="consultation-form" method="post" action="{{route('consultations.store',$patient->uuid)}}">
                @csrf
                <div class="row mb-15px">
                    <label for="general_physical_examination" class="form-label col-form-label col-md-3">{{ 'Genral physical Examination' }}</label>
                    <div class="col-md-9">
                        <textarea class="form-control mb-5px" id="general_physical_examination" name="general_physical_examination" rows="1"></textarea>
                    </div>
                </div>
                <br>
                <div class="row mb-15px">
                    <label for="central_nervous_system_examination" class="form-label col-form-label col-md-3">{{ 'Central Nervous System Examination'}}</label>
                    <div class="col-md-9">
                        <textarea class="form-control mb-5px" id="central_nervous_system_examination" name="central_nervous_system_examination" rows="1"></textarea>
                    </div>
                </div>
                <br>
                <div class="row mb-15px">
                    <label for="cardiovascular_system_examination" class="form-label col-form-label col-md-3">{{ 'Cardiovascular System Examination' }}</label>
                    <div class="col-md-9">
                        <textarea class="form-control mb-5px" id="cardiovascular_system_examination" name="cardiovascular_system_examination" rows="1"></textarea>
                    </div>
                </div>
                <br>
                <div class="row mb-15px">
                    <label for="respiratory_system_examination" class="form-label col-form-label col-md-3">Respiratory System Examination</label>
                    <div class="col-md-9">
                        <textarea class="form-control mb-5px" id="respiratory_system_examination" name="respiratory_system_examination" rows="1"></textarea>
                    </div>
                </div><br>
                <div class="row mb-15px">
                    <label for="digestive_system_examination" class="form-label col-form-label col-md-3">Digestive System Examination</label>
                    <div class="col-md-9">
                        <textarea class="form-control mb-5px" id="digestive_system_examination" name="digestive_system_examination" rows="1"></textarea>
                    </div>
                </div><br>
                <div class="row mb-15px">
                    <label for="ear_nose_and_throat_examination" class="form-label col-form-label col-md-3">Ear, Nose and Throat Examination</label>
                    <div class="col-md-9">
                        <textarea class="form-control mb-5px" id="ear_nose_and_throat_examination" name="ear_nose_and_throat_examination" rows="1"></textarea>
                    </div>
                </div><br>
                <div class="row mb-15px">
                    <label for="musculoskeletal_system_examination" class="form-label col-form-label col-md-3">Musculoskeletal System Examination</label>
                    <div class="col-md-9">
                        <textarea class="form-control mb-5px" id="musculoskeletal_system_examination" name="musculoskeletal_system_examination" rows="1"></textarea>
                    </div>
                </div>
                <hr>
                <div class="row mb-15px">
                    <label for="skin_examination" class="form-label col-form-label col-md-3">Skin Examination</label>
                    <div class="col-md-9">
                        <textarea class="form-control mb-5px" id="skin_examination" name="skin_examination" rows="1"></textarea>
                    </div>
                </div><br>
                <div class="row mb-15px">
                    <label for="findings" class="form-label col-form-label col-md-3">Findings</label>
                    <div class="col-md-9">
                        <textarea class="form-control mb-5px" id="findings" name="findings" rows="1"></textarea>
                    </div>
                </div><br>
                <div class="row mb-15px">
                    <label for="provisional_diagnosis" class="form-label col-form-label col-md-3">Provisional Diagnosis</label>
                    <div class="col-md-9">
                        <textarea class="form-control mb-5px" id="provisional_diagnosis" name="provisional_diagnosis" rows="1"></textarea>
                    </div>
                </div><br>
                <div class="row mb-15px">
                    <label for="treatment_plan" class="form-label col-form-label col-md-3">Treatment Plan</label>
                    <div class="col-md-9">
                        <textarea class="form-control mb-5px" id="treatment_plan" name="treatment_plan" rows="1"></textarea>
                    </div>
                </div><br>
                <div class="row mb-15px">
                    <label for="comment" class="form-label col-form-label col-md-3">Comment</label>
                    <div class="col-md-9">
                        <textarea class="form-control mb-5px" id="comment" name="comment" ></textarea>
                    </div>
                </div><br>
                <div class="row mb-15px">
                    <label for="name" class="form-label col-form-label col-md-3">Follow-Up Appointment</label>
                    <div class="col-md-9">
                        <input type="date" class="form-control mb-5px" name="follow_up_appointment" id="follow_up_appointment" style="border:0; outline:0; background:transparent; border-bottom:1px solid black;"/>
                    </div>
                </div><br>
                <div class="row mb-15px">
                    <label for="cost_of_consultation" class="form-label col-form-label col-md-3">Cost of Consultation (&#8358;)</label>
                    <div class="col-md-9">
                        <input type="number" class="form-control mb-5px" name="cost_of_consultation" id="cost_of_consultation" style="border:0; outline:0; background:transparent; border-bottom:1px solid black;"/>
                    </div>
                </div>
                <hr>
                <h4>VITALS</h4>
                <div class="row mb-15px">
                    <label for="weight" class="form-label col-form-label col-md-3">Weight</label>
                    <div class="col-md-9">
                        <input type="number" name="weight" class="form-control mb-5px" id="weight" style="border:0; outline:0; background:transparent; border-bottom:1px solid black;"/>
                    </div>
                </div><br>
                <div class="row mb-15px">
                    <label for="height" class="form-label col-form-label col-md-3">Height</label>
                    <div class="col-md-9">
                        <input type="number" name="height" class="form-control mb-5px" id="height" style="border:0; outline:0; background:transparent; border-bottom:1px solid black;"/>
                    </div>
                </div><br>
                <div class="row mb-15px">
                    <label for="temperature" class="form-label col-form-label col-md-3">Temperature</label>
                    <div class="col-md-9">
                        <input type="number" name="temperature" class="form-control mb-5px" id="temperature" style="border:0; outline:0; background:transparent; border-bottom:1px solid black;"/>
                    </div>
                </div><br>
                <div class="row mb-15px">
                    <label for="pain_score" class="form-label col-form-label col-md-3">Pain Score</label>
                    <div class="col-md-9">
                        <input type="number" name="pain_score" class="form-control mb-5px" id="pain_score" style="border:0; outline:0; background:transparent; border-bottom:1px solid black;"/>
                    </div>
                </div><br>
                <div class="row mb-15px">
                    <label for="blood_pressure" class="form-label col-form-label col-md-3">Blood Pressure</label>
                    <div class="col-md-9">
                        <input type="text" name="blood_pressure" class="form-control mb-5px" id="blood_pressure" style="border:0; outline:0; background:transparent; border-bottom:1px solid black;"/>
                    </div>
                </div><br>
                <div class="row mb-15px">
                    <label for="pulse_rate" class="form-label col-form-label col-md-3">Pulse Rate</label>
                    <div class="col-md-9">
                        <input type="text" name="pulse_rate" class="form-control mb-5px" id="pulse_rate" style="border:0; outline:0; background:transparent; border-bottom:1px solid black;"/>
                    </div>
                </div><br>
                <div class="row mb-15px">
                    <label for="oxygen_saturation" class="form-label col-form-label col-md-3">Oxygen Saturation</label>
                    <div class="col-md-9">
                        <input type="text" name="oxygen_saturation" class="form-control mb-5px" id="oxygen_saturation" style="border:0; outline:0; background:transparent; border-bottom:1px solid black;"/>
                    </div>
                </div><br>
                <div class="row mb-15px">
                    <label for="oxygen_saturation" class="form-label col-form-label col-md-3">Others</label>
                    <div class="col-md-9">
                        <textarea class="form-control mb-5px" id="others" name="others"></textarea>
                    </div>
                </div><br>
                <div class="m-t-20 text-right">
                    <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End of Form Container --}}

@push('page_script')
<script type="text/javascript">
    const tx = document.getElementsByTagName("textarea");
    for (let i = 0; i < tx.length; i++) {
        tx[i].setAttribute("style", "height:" + (tx[i].scrollHeight) + "px;overflow-y:hidden;resize:none;box-sizing:border-box;width:100%;min-height:35px;padding:5px;background:transparent;border:0; outline:0;border-bottom:1px solid black;");
        tx[i].addEventListener("input", OnInput, false);
    }

    function OnInput() {
        this.style.height = 0;
        this.style.height = (this.scrollHeight) + "px";
    }

    $("document").ready(function(){
        setTimeout(function(){
            $("div.alert").remove();
        }, 5000);
    });
</script>
@endpush
