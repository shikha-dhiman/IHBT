@extends('Receptionist.Layouts.main')
@section('content')
<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('receptionist_user')}}">Dashboard</a></li>
                        <li class="breadcrumb-item "><a href="{{url('receptionist_user/receipt')}}" class="capt-cls">Employees</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)" class="capt-cls">{{request()->route()->getName()}}</a></li>
                    </ol>
                </div>
            </div>
            @if (\Session::has('success'))
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                     <div class="alert alert-success">
                         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         {!! \Session::get('success') !!}
                     </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="header-body">
                                    <h4 class="card-title capt-cls">Employee</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Designation</th>
                                                <th>Employee ID</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($employee as $key => $emp)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td class="capt-cls">{{$emp->name}}</td>
                                                <td class="capt-cls">{{$emp->mobile}}</td>
                                                <td class="capt-cls">{{$emp->designation}}</td>
                                                <td class="capt-cls">@if($emp->employee_id){{$emp->employee_id}} @else N/A @endif</td>
                                                <td><a href="{{url('receptionist_user/receipt/create_receipt?emp_id='.$emp->id.'&name='.$emp->name.'&age='.$emp->age.'&sex='.$emp->sex.'&family_id=')}}" class="btn btn-rounded btn-icon btn-add-receipt btn-custom-padding" id=""><i class="ti-plus"></i></a><a href="{{url('receptionist_user/receipt/detail?id='.$emp->id)}}" class="btn mb-1 btn-rounded btn-outline-warning btn-custom-padding" title="View"><i class="ti-eye"></i></a>
                                                <a href="{{url('receptionist_user/receipt/receipt?emp_id='.$emp->id.'&family_id=')}}" class="btn mb-1 btn-light btn-rounded btn-icon btn-common-pdng btn-listing btn-custom-padding" title="List receipt"><i class="icon-doc"></i></a>
                                            </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="header-body">
                                    <h4 class="card-title capt-cls">Family Member</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Relation</th>
                                                <th>Age</th>
                                                <th>Sex</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($family_member as $key => $val)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td class="capt-cls">{{$val->name}}</td>
                                                <td class="capt-cls">{{$val->relation}}</td>
                                                <td class="capt-cls">{{$val->age}}</td>
                                                <td class="capt-cls">{{$val->sex}}</td>
                                                <td><a href="{{url('receptionist_user/receipt/create_receipt?emp_id='.$emp->id.'&name='.$val->name.'&age='.$val->age.'&sex='.$val->sex.'&family_id='.$val->id)}}" class="btn btn-rounded btn-icon btn-add-receipt btn-custom-padding" id=""><i class="ti-plus"></i></a><a href="{{url('receptionist_user/receipt/detail?id='.$emp->id)}}" class="btn mb-1 btn-rounded btn-outline-warning btn-custom-padding" title="View"><i class="ti-eye"></i></a>
                                                <a href="{{url('receptionist_user/receipt/receipt?emp_id='.$emp->id.'&family_id='.$val->id)}}" class="btn mb-1 btn-light btn-rounded btn-icon btn-common-pdng btn-listing btn-custom-padding" title="List receipt"><i class="icon-doc"></i></a>
                                            </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        @endsection
 