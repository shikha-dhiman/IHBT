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
                        <li class="breadcrumb-item active"><a href="{{url('receptionist_user/receipt/detail-list?id='.request()->input('emp_id'))}}" class="capt-cls">Detail</a></li>
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
                                  @foreach($receipt as $key => $emp)
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
                                                       <input type="text" class="form-control" placeholder="Max"  name="bp_max" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="3" minlength="2"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="{{ json_decode($emp->blood_pressure)->bp_max }}">
                                                       </div>
                                                       <div style="margin-top: 10px;">
                                                        <input type="text" class="form-control" placeholder="Min"  name="bp_min" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="3" minlength="2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="{{ json_decode($emp->blood_pressure)->bp_min }}">
                                                      </div>
                                                      </div>
                                                    </div>
                                                    <div class="col">
                                                      <div  style="display: flex;">
                                                        <div class="col-5"><p class="">Blood sugar</p></div>
                                                          <div class="col-7"> 
                                                            <div>
                                                              <input type="text" class="form-control" placeholder=""  name="blood_sugar" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="4" minlength="2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  value="{{$emp->blood_sugar}}">
                                                          </div>
                                                        </div>
                                                      </div> 
                                                      <div  style="display: flex; margin-top: 10px;">
                                                        <div class="col-5"><p class="">Temperature</p></div>
                                                          <div class="col-7"> 
                                                            <div>
                                                              <input type="text" class="form-control" placeholder=""  name="temperature" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="4" minlength="2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="{{$emp->temperature}}">
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
                                                              <textarea class="form-control capt-cls" id="diagnosis" name="diagnosis" onkeydown="return /[A-Za-z ]/i.test(event.key)" required></textarea> 
                                                          </div>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                  <div class="col">
                                                    <div style="display: flex; margin-top: 10px;">
                                                      <div class="col-2"><p class="">File</p></div>
                                                        <div class="col-10"> 
                                                          <div style="margin-left: 37px;">
                                                            <input type="file" name="image" id="pdf_image" class="form-control" required>
                                                        </div>
                                                        <div style="margin-left: 37px;">
                                                          <p style="color: red;">Note: Please choose file to upload updated receipt.</p>
                                                        </div>
                                                      </div>
                                                    </div> 
                                                 </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="col-lg-12 ml-auto">
                                                <div class="">
                                                    <div class="col">
                                                       <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    @endforeach
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
       