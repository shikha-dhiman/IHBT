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
                        <li class="breadcrumb-item active"><a href="{{url('receptionist_user/receipt')}}" class="capt-cls">Employees</a></li>
                        <li class="breadcrumb-item active"><a href="{{url()->previous()}}" class="capt-cls">Detail</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)" class="capt-cls">{{request()->route()->getName()}}</a></li>
                    </ol>
                </div>
            </div>
          <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body" style="display: flex;">
                            <div class="col-lg-6">
                                <div class="card">
                                  @foreach($employee as $key => $emp)
                                  <div class="card-title emp-card-title">
                                    @if(request()->input('type') == 1)
                                     <h5>Employee detail</h5>
                                    @elseif(request()->input('type') == 2)
                                      <h5>Receptionist detail</h5>
                                    @elseif(request()->input('type') == 3)
                                      <h5>Doctor detail</h5>
                                    @endif
                                  </div>
                                    <div class="card-body card-employee">
                                       <div class="col-lg-12" style="display: flex;">
                                         <div class="col-lg-5 emp-col-lg-6">
                                          <ul>
                                            <li>Name:</li>
                                            <li>Mobile:</li>
                                            <li>Email:</li>
                                            <li>Designation:</li>
                                            <li>Division:</li>
                                            <li>Emp. ID:</li>
                                            <li>Date of retirement:</li>
                                            <li>Blood group:</li>
                                            <li>Family members:</li>
                                            <li>Age:</li>
                                            <li>Sex:</li>
                                            <li>Address:</li>
                                          </ul>
                                         </div>
                                         <div class="col-lg-7">
                                          <ul>
                                            <li class="capt-cls">{{$emp->name}}</li>
                                            <li>{{$emp->mobile}}</li>
                                            <li>{{$emp->email}}</li>
                                            <li class="capt-cls">{{$emp->designation}}</li>
                                            <li class="capt-cls">@if($emp->division){{$emp->division}} @else N/A @endif</li>
                                            <li>@if($emp->employee_id){{$emp->employee_id}} @else N/A @endif</li>
                                            @if( $emp->date_of_retirement == "")
                                            <li>N/A</li>
                                            @else
                                            <li>@if($emp->date_of_retirement){{ $emp->date_of_retirement}} @else N/A @endif</li>
                                            @endif
                                            <li class="capt-cls">{{$emp->blood_group}}</li>
                                            <li class="capt-cls">{{$noOfMember}}</li>
                                            <li class="capt-cls">{{$emp->age}}</li>
                                            <li class="capt-cls">{{$emp->sex}}</li>
                                            <li class="capt-cls">{{$emp->employee_address}}</li>
                                          </ul>
                                         </div>
                                       </div>
                                    </div>
                               </div>
                            </div>
                            <div class="col-lg-6">
                               @foreach($family_member as $key => $val)
                                <div class="card">
                                  <div class="card-title emp-card-title">
                                    <h5>Family member {{$loop->iteration }}</h5>
                                  </div>
                                    <div class="card-body card-employee">
                                       <div class="col-lg-12" style="display: flex;">
                                         <div class="col-lg-5 emp-col-lg-6">
                                          <ul>
                                            <li>Name:</li>
                                            <li>Relation:</li>
                                            <li>DOB:</li>
                                             <li>Age:</li>
                                            <li>Sex :</li>
                                            <li>Blood group:</li>
                                          </ul>
                                         </div>
                                         <div class="col-lg-7">
                                          <ul>
                                            <li class="capt-cls">{{$val->name}}</li>
                                            <li class="capt-cls">{{$val->relation}}</li>
                                            <li>{{$val->dob}}</li>
                                            <li>{{$val->age}}</li>
                                            <li class="capt-cls">{{$val->sex}}</li>
                                            <li class="capt-cls">{{$val->blood_group}}</li>
                                          </ul>
                                         </div>
                                       </div>
                                    </div>
                               </div>
                                @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
      </div>
<!--**********************************
    Content body end
***********************************-->
@endsection