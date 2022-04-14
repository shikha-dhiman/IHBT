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
            <!-- row -->
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card">
                            <div class="card-body">
                              @if($errors->any())
                                    <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;"><!-- {{$errors->first()}} -->Error-{{$errors->first()}}
                                    </div>
                                @endif
                                <div class="">
                                    <form method="post">
                                        @csrf
                                        <input type="hidden" name="url" value="{{str_replace(url('/'), '', url()->previous())}}">
                                        <h4 class="card-title capt-cls"></h4>
                                         <div class="form-group row">
                                            <div class="col-lg-12">
                                                <div class="form-row">
                                                    <div class="col" style="display: flex;">
                                                      <div class="col-5"><p class="bp">Blood pressure</p></div>
                                                      <div class="col-7"> 
                                                        <div>
                                                       <input type="text" class="form-control" placeholder="Max"  name="bp_max" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="3" minlength="2"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" >
                                                       </div>
                                                       <div style="margin-top: 10px;">
                                                        <input type="text" class="form-control" placeholder="Min"  name="bp_min" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="3" minlength="2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" >
                                                      </div>
                                                      </div>
                                                    </div>
                                                    <div class="col">
                                                      <div  style="display: flex;">
                                                        <div class="col-5"><p class="">Blood sugar</p></div>
                                                          <div class="col-7"> 
                                                            <div>
                                                              <input type="text" class="form-control" placeholder=""  name="blood_sugar" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="4" minlength="2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" >
                                                          </div>
                                                        </div>
                                                      </div> 
                                                      <div  style="display: flex; margin-top: 10px;">
                                                        <div class="col-5"><p class="">Temperature</p></div>
                                                          <div class="col-7"> 
                                                            <div>
                                                              <input type="text" class="form-control" placeholder=""  name="temperature" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="4" minlength="2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" >
                                                          </div>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12 ml-auto">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="col-5">
                                                            <button type="submit" class="btn btn-primary">Create</button>
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
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        @endsection
       