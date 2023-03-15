@extends('layouts.master')

@section('content')

<div class="page-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Consultation</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('error_message'))
                    <div class="alert alert-danger">{{ \Session::get('error_message') }}</div>
                    @php
                        Illuminate\Support\Facades\Session::forget('error_message');
                    @endphp
                @endif

                <form method="GET" role="filter">
                    @csrf
                    <div class="input-group input-group-lg mb-3">
                        <input type="text" class="typeahead form-control input-white" placeholder="Enter patient number here..." name="patient_id" id="patient_id" value="{{$patient_id}}" />
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search fa-fw"></i> Search</button>
                    </div>
                </form>

                <div class="col-md-12 parent_tab row" style="margin-bottom:0px; padding-bottom:0px">
                    <div class="col-1">
                        @if(is_null($patient))
                            <div class="widget-img widget-img-xl rounded-circle bg-dark" style="background-image: url({{asset('/assets/img/user.jpg')}})">
                        @else
                            <div class="widget-img widget-img-xl rounded-circle bg-dark" style="background-image: url({{asset('/patient_photo/'.$patient->photo)}})">
                        @endif
                        </div>
                    </div>
                    <div class="col-3" style="margin-left:10px;">

                        <dl class="row">
                            @if(is_null($patient))
                                <dt  class="col-md-3"><h4> N/A </h4></dt>
                                <dd  class="col-md-9"></dd>

                                <dt  class="col-md-3">Hospital No</dt>
                                <dd  class="col-md-9">N/A</dd>

                                <dt  class="col-md-3">Firstname</dt>
                                <dd  class="col-md-9">N/A</dd>

                                <dt  class="col-md-3">Lastname</dt>
                                <dd  class="col-md-9">N/A</dd>

                                <dt  class="col-md-3">Phone</dt>
                                <dd  class="col-md-9">N/A</dd>
                            @else
                                <dt  class="col-md-3">Hospital No</dt>
                                <dd  class="col-md-9">{{$patient->hospital_no}}</dd>

                                <dt  class="col-md-3">Firstname</dt>
                                <dd  class="col-md-9">{{$patient->first_name}}</dd>

                                <dt  class="col-md-3">Lastname</dt>
                                <dd  class="col-md-9">{{$patient->last_name}}</dd>

                                <dt  class="col-md-3">Phone</dt>
                                <dd  class="col-md-9">{{$patient->phone}}</dd>
                            @endif
                        </dl>

                    </div>
                    <div class="col-3">

                        <dl class="row">
                            @if(is_null($patient))
                                <dt  class="col-md-3">Gender</dt>
                                <dd  class="col-md-9">N/A</dd>

                                <dt  class="col-md-3">Marital Status</dt>
                                <dd  class="col-md-9">N/A</dd>

                                <dt  class="col-md-3">DOB</dt>
                                <dd  class="col-md-9">N/A</dd>

                                <dt  class="col-md-3">Age</dt>
                                <dd  class="col-md-9">N/A</dd>
                            @else
                                <dt  class="col-md-3">Gender</dt>
                                <dd  class="col-md-9">{{$patient->gender}}</dd>

                                <dt  class="col-md-3">Marital Status</dt>
                                <dd  class="col-md-9">{{$patient->marital_status}}</dd>

                                <dt  class="col-md-3">DOB</dt>
                                <dd  class="col-md-9">{{$patient->dob->format('Y-m-d')}}</dd>

                                <dt  class="col-md-3">Age</dt>
                                <dd  class="col-md-9">{{$patient->age}}</dd>
                            @endif
                        </dl>
                    </div>

                    <div class="col-4">
                        <dl class="row">
                            @if(is_null($patient))
                                <dt  class="col-md-5">Next of Kin Full Name</dt>
                                <dd  class="col-md-9">N/A</dd>

                                <dt  class="col-md-5">Next of Kin Phone Number</dt>
                                <dd  class="col-md-9">N/A</dd>
                            @else
                                <dt  class="col-md-5">Next of Kin Name</dt>
                                <dd  class="col-md-9">{{$patient->next_of_kin_name}}</dd>

                                <dt  class="col-md-5">Next of Kin Phone</dt>
                                <dd  class="col-md-9">{{$patient->next_of_kin_phone}}</dd>
                            @endif
                        </dl>
                    </div>

                    <div class="col-12 mt-4">
                        @if(isset($patient))
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active" data-url="{{route('consultations.form', $patient->uuid)}}">
                                        Patient Assessment
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link" data-url="{{route('consultations.index', $patient->id)}}">
                                        History
                                    </a>
                                </li>
                            </ul>
                        @endif
                        <div class="tab-content panel p-3 rounded-0 rounded-bottom">
                            <div class="tab-pane fade active show" id="default-tab-1">
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
                                            @if(is_null($patient))
                                                <form>
                                            @else
                                                <form id="consultation-form" method="post" action="{{route('consultations.store',$patient->uuid)}}" accept-charset="UTF-8">
                                                @csrf
                                            @endif
                                                <br>
                                                <div class="row mb-15px">
                                                    <label for="general_physical_examination" class="form-label col-form-label col-md-3">{{ 'Genral physical Examination' }}</label>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control mb-5px message-box" id="general_physical_examination" name="general_physical_examination" rows="1"></textarea>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row mb-15px">
                                                    <label for="central_nervous_system_examination" class="form-label col-form-label col-md-3">Central Nervous System Examination</label>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control mb-5px" id="central_nervous_system_examination" name="central_nervous_system_examination" rows="1"></textarea>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row mb-15px">
                                                    <label for="cardiovascular_system_examination" class="form-label col-form-label col-md-3">Cardiovascular System Examination</label>
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
                                                        <input type="date" class="form-control mb-5px" name="follow_up_appointment" id="name" style="border:0; outline:0; background:transparent; border-bottom:1px solid black;"/>
                                                    </div>
                                                </div><br>
                                                <div class="row mb-15px">
                                                    <label for="cost_of_consultation" class="form-label col-form-label col-md-3">Cost of Consultation (&#8358;)</label>
                                                    <div class="col-md-9">
                                                        <input type="number" class="form-control mb-5px" name="cost_of_consultation" id="cost_of_consultation" style="border:0; outline:0; background:transparent; border-bottom:1px solid black;"/>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>EXTRAS</h4>
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
                            </div>
                            {{-- End of tab content --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@endsection

@push('page_script')
    <script type="text/javascript">
        $(function(){
            $('[data-bs-toggle="tab"]').ajaxtab({
                targetChild:'.tab-pane',
                parentElem: '.parent_tab'
                // followHash: true
            });

            const tx = document.getElementsByTagName("textarea");
            for (let i = 0; i < tx.length; i++) {
                tx[i].setAttribute("style", "height:" + (tx[i].scrollHeight) + "px;overflow-y:hidden;resize:none;box-sizing:border-box;width:100%;min-height:35px;padding:5px;background:transparent;border:0; outline:0;border-bottom:1px solid black;");
                tx[i].addEventListener("input", OnInput, false);
            }

            function OnInput() {
                this.style.height = 0;
                this.style.height = (this.scrollHeight) + "px";
            }

        });
        $("document").ready(function(){
            setTimeout(function(){
                $("div.alert").remove();
            }, 5000);
        });

    </script>
@endpush
