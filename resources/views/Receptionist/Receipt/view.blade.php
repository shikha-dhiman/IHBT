@extends('Receptionist.Layouts.main')
@section('content')
<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
           @foreach($receipt as $key => $emp)
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('receptionist_user')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('receptionist_user/receipt')}}" class="capt-cls">Employees</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('receptionist_user/receipt/detail-list?id='.$emp->emp_id)}}" class="capt-cls">Detail</a></li>
                        <li class="breadcrumb-item active"><a href="{{url()->previous()}}" class="capt-cls">Receipt</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)" class="capt-cls">{{request()->route()->getName()}}</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card">
                            <div class="card-body">
                                <div class="">
                                    <form method="post" enctype="multipart/form-data">
                                        @csrf
                                        <h4 class="card-title capt-cls"></h4>
                                         <div class="form-group row">
                                            <div class="col-lg-12">
                                                <div class="form-row">
                                                    <div class="col" style="display: flex;">
                                                      <div class="col-5"><p class="bp">Blood pressure</p></div>
                                                      <div class="col-7"> 
                                                        <div>
                                                       <input type="text" class="form-control" value="{{ json_decode($emp->blood_pressure)->bp_max }}" readonly>
                                                       </div>
                                                       <div style="margin-top: 10px;">
                                                        <input type="text" class="form-control" value="{{ json_decode($emp->blood_pressure)->bp_min }}" readonly>
                                                      </div>
                                                      </div>
                                                    </div>
                                                    <div class="col">
                                                      <div  style="display: flex;">
                                                        <div class="col-5"><p class="">Blood sugar</p></div>
                                                          <div class="col-7"> 
                                                            <div>
                                                              <input type="text" class="form-control" placeholder=""  name="blood_sugar" value="{{$emp->blood_sugar}}" readonly>
                                                          </div>
                                                        </div>
                                                      </div> 
                                                      <div  style="display: flex; margin-top: 10px;">
                                                        <div class="col-5"><p class="">Temperature</p></div>
                                                          <div class="col-7"> 
                                                            <div>
                                                              <input type="text" class="form-control" placeholder=""  name="temperature" value="{{$emp->temperature}}" readonly>
                                                          </div>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                      <div style="display: flex; margin-top: 10px;">
                                                        <div class="col-2"><p class="">Diagnosis</p></div>
                                                          <div class="col-10"> 
                                                            <div style="margin-left: 37px;">
                                                              <textarea class="form-control capt-cls" readonly>{{$emp->diagnosis}}</textarea> 
                                                          </div>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                  <div class="col">
                                                    <div style="display: flex; margin-top: 10px;">
                                                      <div class="col-2"><p class=""></p></div>
                                                        <div class="col-10"> 
                                                          <div style="margin-left: 37px;">
                                                            <div class="pdf-view">
                                                            <a href="{{url('receptionist_user/receipt/pdf?id='.$emp->id)}}" class="pdf-link">Click here to view pdf</a>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div> 
                                                 </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
            @endforeach
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        @endsection
       