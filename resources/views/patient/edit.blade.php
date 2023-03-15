@extends('layouts.master')

@section('content')
        <div class="page-wrapper">
            <section class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title"><a href="{{route('patients.index')}}" title="Back to List"><button class="btn btn-secondary btn-sm"><i class="fa fa-chevron-left" aria-hidden="true"></i></button></a>  Edit Patient</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post" action="{{route('patients.update',$patient->uuid)}}" accept-charset="UTF-8" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Hospital Number <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="hospital_no" value="{{ isset($patient->hospital_no) ? $patient->hospital_no : ' '}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="first_name" value="{{ isset($patient->first_name) ? $patient->first_name : ' '}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input class="form-control" type="text" name="last_name" value="{{ isset($patient->last_name) ? $patient->last_name : ' '}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone </label>
                                        <input class="form-control" type="text" name="phone" value="{{ isset($patient->phone) ? $patient->phone : ' '}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email" value="{{ isset($patient->email) ? $patient->email : ' '}}">
                                    </div>
                                </div>
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Address</label>
												<input type="text" class="form-control" name="address" value="{{ isset($patient->address) ? $patient->address : ' '}}">
											</div>
										</div>
									</div>
								</div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Next of Kin Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="next_of_kin_name" value="{{ isset($patient->next_of_kin_name) ? $patient->next_of_kin_name : ' '}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Next of Kin Phone </label>
                                        <input class="form-control" type="text" name="next_of_kin_phone" value="{{ isset($patient->next_of_kin_phone) ? $patient->next_of_kin_phone : ' '}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group">
										<label>Avatar</label>
										<div class="profile-upload">
											<div class="upload-img">
												<img alt="" src="{{asset('assets/img/user.jpg')}}">
											</div>
											<div class="upload-input">
												<input type="file" class="form-control" name="photo">
											</div>
										</div>
									</div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="display-block">Marital Status</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="marital_status" id="patient_single" value="single" {{($patient->marital_status=="single")? "checked" : "" }}>
                                            <label class="form-check-label" for="patient_single">
                                            Single
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="marital_status" id="patient_married" value="married" {{($patient->marital_status=="married")? "checked" : "" }}>
                                            <label class="form-check-label" for="patient_married">
                                            Married
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
@endsection
