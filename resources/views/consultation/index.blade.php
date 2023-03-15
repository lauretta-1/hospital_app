@extends('layouts.master')
@section('content')
    <div class="table-responsive">
        <table class="table table-border table-striped custom-table datatable mb-0">
            <thead>
                <tr>
                    <th>Findings</th>
                    <th>Diagnosis</th>
                    <th>Created_at</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($consultations as $consultation)
                <tr>
                    <td>{{$consultation->findings}}</td>
                    <td>{{$consultation->provisional_diagnosis}}</td>
                    <td>{{$consultation->created_at}}</td>
                    <td class="text-right">
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#default-tab-3" data-bs-toggle="tab" class="nav-link" data-url="{{route('consultations.edit', $consultation->id)}}">
                                    <i class="fa fa-pencil m-r-5"></i> Edit
                                </a>
                                <a href="#default-tab-4" data-bs-toggle="tab" class="nav-link" data-url="{{route('consultations.show', $consultation->id)}}">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Show
                                </a>
                                {{-- <a class="dropdown-item" href="{{route('consultations.show', $consultation->uuid)}}"><i class="fa fa-pencil m-r-5"></i> Show</a> --}}
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@push('page_script')
<script type="text/javascript">
    $(document).ready(function() {
        $(".dropdown-toggle").dropdown();
    });
</script>
@endpush
