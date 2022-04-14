@extends('Doctor.Layouts.main')
@section('content')
<!--**********************************
            Content body start
        ***********************************-->
  <div class="content-body">
        <div class="row page-titles mx-0">
            <div class="col p-md-0">
               @foreach($receipt as $key => $emp)
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('doctor')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('doctor/receipts')}}" class="capt-cls">Employees</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('doctor/receipts/detail-list?id='.$emp->emp_id)}}" class="capt-cls">Detail</a></li>
                        <li class="breadcrumb-item active"><a href="{{url()->previous()}}" class="capt-cls">Receipts</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)" class="capt-cls">{{request()->route()->getName()}}</a></li>
                </ol>
            </div>
        </div>
          <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                          <div class="header-body" id="treatment_header">
                              <h4 class="card-title capt-cls">Treatment detail</h4>
                          </div>
                          <div class="col-lg-12" style="display: flex;">
                            <div class="col-lg-6">
                              <div class="card-body card-employee">
                                 <div class="col-lg-12" style="display: flex;">
                                   <div class="col-lg-5 emp-col-lg-6">
                                    <ul>
                                      <li>Employee name:</li>
                                      <li>Registration no.:</li>
                                      <li>Patient name:</li>
                                      @if(!empty($emp->diagnosis))
                                      <li>Diagnosis:</li>
                                      @endif
                                      <li>Blood pressure:</li>
                                    </ul>
                                   </div>
                                   <div class="col-lg-7">
                                    <ul>
                                      <li class="capt-cls">{{$emp->emp_name}}</li>
                                      <li>{{$emp->registration_no}}</li>
                                      <li class="capt-cls">{{$emp->patient_name}}</li>
                                       @if(!empty($emp->diagnosis))
                                      <li class="capt-cls">{{$emp->diagnosis}}</li>
                                      @endif
                                      <li class="capt-cls">Max: @if($emp->blood_pressure){{ json_decode($emp->blood_pressure)->bp_max }} Min: {{ json_decode($emp->blood_pressure)->bp_min }}@else N/A @endif</li>
                                    </ul>
                                   </div>
                                 </div>
                                 @if(!empty($emp->pdf))
                                 <div class="col-lg-12">
                                  <div class="col-lg-6 emp-col-lg-6 pdf-view">
                                    <a href="{{url('doctor/receipts/pdf?id='.$emp->id)}}" class="pdf-link">Click here to view pdf</a>
                                  </div>
                                  </div>
                                  @endif
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="card-body card-employee">
                                 <div class="col-lg-12" style="display: flex;">
                                   <div class="col-lg-5 emp-col-lg-6">
                                    <ul>
                                      <li>Date:</li>
                                      <li>Age:</li>
                                      <li>Sex:</li>
                                      <li>Temperature:</li>
                                      <li>Blood sugar:</li>
                                    </ul>
                                   </div>
                                   <div class="col-lg-7">
                                    <ul>
                                      <li>{{$emp->date}}</li>
                                      <li class="capt-cls">{{$emp->age}}</li>
                                      <li class="capt-cls">{{$emp->gender}}</li>
                                      <li>@if($emp->temperature){{$emp->temperature}} @else N/A @endif</li>
                                      <li>@if($emp->blood_sugar){{$emp->blood_sugar}}@else N/A @endif</li>
                                    </ul>
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
      </div>
<!--**********************************
    Content body end
***********************************-->
@endsection