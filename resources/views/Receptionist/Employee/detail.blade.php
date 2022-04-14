@extends('Receptionist.Layouts.main')
@section('content')
<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('owner')}}">Dashboard</a></li>
                        @if(request()->input('type') == 1)
                          <li class="breadcrumb-item active capt-cls"><a href="{{url(request()->route()->getPrefix().'?type='.request()->input('type'))}}" class="capt-cls">employee</a></li>
                        @elseif(request()->input('type') == 2)
                          <li class="breadcrumb-item active capt-cls"><a href="{{url(request()->route()->getPrefix().'?type='.request()->input('type'))}}" class="capt-cls">receptionist</a></li>
                        @elseif(request()->input('type') == 3)
                          <li class="breadcrumb-item active capt-cls"><a href="{{url(request()->route()->getPrefix().'?type='.request()->input('type'))}}" class="capt-cls">doctor</a></li>
                        @endif
                        <li class="breadcrumb-item active"><a href="javascript:void(0)" class="capt-cls">{{request()->route()->getName()}}</a></li>
                    </ol>
                </div>
            </div>
          <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-lg-12">
                                <div class="card">
                                  @foreach($employee as $key => $val)
                                  <div class="card-title emp-card-title">
                                    @if(request()->input('type') == 1)
                                     <h5>Employee detail</h5>
                                     <button class="btn btn-primary mb-3" type="submit" style="margin-left:104px;">details</button>
                                    @elseif(request()->input('type') == 2)
                                      <h5>Receptionist detail</h5>
                                    @elseif(request()->input('type') == 3)
                                      <h5>Doctor detail</h5>
                                    @endif
                                  </div>
                                    <div class="card-body card-employee">
                                       <div class="col-lg-12" style="display: flex;">
                                         <div class="col-lg-3 emp-col-lg-6">
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
                                            @if($val->employee_type == 'retired')
                                            <li>PPO:</li>
                                            <li>Amount of contribution:</li>
                                            @endif
                                            <li>Regular medicine:</li>
                                            <li>Pre existing condition:</li>
                                            <li>Address:</li>
                                          </ul>
                                         </div>
                                         <div class="col-lg-7">
                                          <ul>
                                            <li class="capt-cls">{{$val->name}}</li>
                                            <li>{{$val->mobile}}</li>
                                            <li>{{$val->email}}</li>
                                            <li class="capt-cls">{{$val->designation}}</li>
                                            <li class="capt-cls">@if($val->division){{$val->division}} @else N/A @endif</li>
                                            <li>@if($val->employee_id){{$val->employee_id}} @else N/A @endif</li>
                                            <li class="capt-cls">@if($val->date_of_retirement) {{$val->date_of_retirement}} @else N/A @endif</li>
                                            <li class="capt-cls">{{$val->blood_group}}</li>
                                            <li class="capt-cls">{{$noOfMember}}</li>
                                            <li class="capt-cls">{{$val->age}}</li>
                                            <li class="capt-cls">{{$val->sex}}</li>
                                            @if($val->employee_type == 'retired')
                                            <li class="capt-cls">{{$val->ppo_no}}</li>
                                            <li class="capt-cls">{{$val->cont_amt}}</li>
                                            @endif
                                            <li class="capt-cls">
                                              @if($val->regular_medicine)
                                                {{$val->regular_medicine}}
                                              @else 
                                               N/A 
                                               @endif                   
                                            </li>
                                            <li class="capt-cls">
                                              @if($val->pre_existing_condition_disease)
                                                {{$val->pre_existing_condition_disease}}
                                              @else 
                                               N/A 
                                               @endif                         </li>

                                            <li class="capt-cls">{{$val->employee_address}}</li>
                                          </ul>
                                          @endforeach
                                         </div>
                                         <div class="col-lg-3">
                                          <img src="{{asset('public/user_asset/images/'.$val->image) }}" alt="image" style="width:100px; height:100px;">
                                         </div>
                                       </div>
                                    </div>
                               </div>
                            </div>
                            <div class="col-lg-12">
                               @foreach($family_member as $key => $val)
                                <div class="card">
                                  <div class="card-title emp-card-title">
                                    <h5>Family member {{$loop->iteration }}</h5>
                                    <button class="btn btn-primary mb-3" type="submit" style="margin-left:90px;">details</button>
                                  </div>
                                    <div class="card-body card-employee">
                                       <div class="col-lg-12" style="display: flex;">
                                         <div class="col-lg-3 emp-col-lg-6">
                                          <ul>
                                            <li>Name:</li>
                                            <li>Relation:</li>
                                            <li>DOB:</li>
                                            <li>Age:</li>
                                            <li>Sex :</li>
                                            <li>Blood group:</li>
                                            <li>Pre existing condition:</li>
                                            <li>Regular medicine:</li>
                                          </ul>
                                         </div>
                                         <div class="col-lg-9">
                                          <ul>
                                            <li class="capt-cls">{{$val->name}}</li>
                                            <li class="capt-cls">{{$val->relation}}</li>
                                            <li>@if($val->dob){{$val->dob}}@else N/A @endif</li>
                                            <li>{{$val->age}}</li>
                                            <li class="capt-cls">{{$val->sex}}</li>
                                            <li class="capt-cls">{{$val->blood_group}}</li>
                                            <li class="capt-cls">@if($val->pre_existing_condition_disease){{$val->pre_existing_condition_disease}}@else N/A @endif</li>
                                            <li class="capt-cls">@if($val->regular_medicine){{$val->regular_medicine}}@else N/A @endif</li>
                                          </ul>
                                         </div>
                                       </div>
                                    </div>
                               </div>
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