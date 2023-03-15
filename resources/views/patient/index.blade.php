@extends('layouts.master')

@section('content')
        <div class="page-wrapper">
            <section class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Patients</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="{{route('patients.create')}}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Patient</a>
                    </div>
                </div>
                <!-- Flash message -->
                @if (session()->has('flash_message'))
                <div class="alert alert-success">{{ \Session::get('flash_message') }}</div>
                @endif
                @if (session()->has('error_message'))
                <div class="alert alert-danger">{{ \Session::get('error_message') }}</div>
                @endif
                {{-- End of Flash message --}}
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table datatable mb-0">
								<thead>
									<tr>
										<th>Name</th>
                                        <th>Hospital No.</th>
										<th>Age</th>
										<th>Phone</th>
										<th>Email</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($patients as $patient)
									<tr>
										<td><img width="28" height="28" src="{{asset('/patient_photo/'.$patient->photo)}}" class="rounded-circle m-r-5" alt=""> {{$patient->first_name}}{{$patient->last_name}}</td>
										<td>{{$patient->hospital_no}}</td>
                                        <td>{{$patient->age}}</td>
										<td>{{$patient->phone}}</td>
										<td>{{$patient->email}}</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="{{route('patients.edit', $patient->uuid)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
												</div>
											</div>
										</td>
									</tr>
                                    @endforeach
								</tbody>
							</table>
						</div>
					</div>
                </div>
            </section>
        </div>
@endsection
@push('page_script')
<script type="text/javascript">
    $("document").ready(function(){
        setTimeout(function(){
            $("div.alert").remove();
        }, 5000);
    });
</script>
@endpush
