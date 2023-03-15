@extends('layouts.master')

@section('content')
        <div class="page-wrapper">
            <section class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title"><a href="{{route('patients.index')}}" title="Back to List"><button class="btn btn-secondary btn-sm"><i class="fa fa-chevron-left" aria-hidden="true"></i></button></a>  Add Patient</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        @if($errors->all())
                            <div class="alert alert-danger fs-4" role="alert">
                                @foreach ($errors->all() as $message)
                                    <div>
                                        {{$message}}
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <form method="post" action="{{route('patients.store')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Hospital Number <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="hospital_no">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="first_name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input class="form-control" type="text" name="last_name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone </label>
                                        <input class="form-control" type="text" name="phone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email">
                                    </div>
                                </div>
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" name="dob">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group gender-select">
										<label class="gen-label">Gender:</label>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" class="form-check-input" value="male">Male
											</label>
										</div>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" class="form-check-input" value="female">Female
											</label>
										</div>
									</div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="gen-label">Marital Status:</label>
                                        <div class="form-check-inline">
                                            <input class="form-check-input" type="radio" name="marital_status" id="patient_single" value="single" checked>
                                            <label class="form-check-label" for="patient_active">
                                            Single
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="marital_status" id="patient_married" value="married">
                                            <label class="form-check-label" for="patient_inactive">
                                            Married
                                            </label>
                                        </div>
                                    </div>
                                </div>
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Address</label>
												<input type="text" class="form-control" name="address">
											</div>
										</div>
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
                                        <label>Next of Kin Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="next_of_kin_name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Next of Kin Phone </label>
                                        <input class="form-control" type="text" name="next_of_kin_phone">
                                    </div>
                                </div>
                            </div>

                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Create Patient</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
    @endsection
