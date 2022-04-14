@extends('Owner.Layouts.main')
@section('content')
<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('owner')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('employee?type=1')}}" class="capt-cls">Employees</a></li>
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
                                    <form class="" action="" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @foreach($user as $key => $val)
                                        <input type="hidden" name="type" value="{{request()->input('type')}}">
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <div class="form-row">
                                                    <div class="col">
                                                       <input type="text" class="form-control capt-cls" id="name" name="name" placeholder="Name" onkeydown="return /[A-Za-z ]/i.test(event.key)" value="{{$val->name}}" required>
                                                     </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control capt-cls" placeholder="Designation" onkeydown="return /[A-Za-z ]/i.test(event.key)" name="designation" value="{{$val->designation}}"required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <input type="text" class="form-control capt-cls" placeholder="Division" name="division" value="{{$val->division}}" required>
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="Employee ID"  name="employee_id" value="{{$val->employee_id}}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{$val->email}}" required>
                                                    </div>
                                                    <div class="col">
                                                        <input type="password" class="form-control textarea_text" placeholder="Password" value="{{$val->password}}" name="password" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <div class="col-lg-12">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control mydatepicker" placeholder="DOB"  name="dob" value="{{$val->dob}}"> <span class="input-group-append"><span class="input-group-text"><i class="mdi mdi-calendar-check"></i></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <select title="Employee Type" class="form-control" name="employee_type" id="employee_type">
                                                            <option value="current" {{$val->employee_type == 'Current' ? 'selected' : ''}}>Current</option>
                                                            <option value="retired" {{$val->employee_type == 'Retired' ? 'selected' : ''}}>Retired</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <div class="col-lg-12">
                                                <div class="form-row">
                                                    <div class="col-6">
                                                        <input type="text" class="form-control capt-cls" placeholder="Blood Group" value="{{$val->blood_group}}" name="blood_group" required>
                                                    </div>
                                                    <div class="col-6 dateOfRetirement" style="display: none;">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control mydatepicker" placeholder="Date of Retirement"  name="date_of_retirement"> <span class="input-group-append"><span class="input-group-text"><i class="mdi mdi-calendar-check"></i></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <input type="text" class="form-control textarea_text" placeholder="Address" name="employee_address"  value="{{$val->employee_address}}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="Contact No."  name="mobile" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="  10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="{{$val->mobile}}" readonly>
                                                        
                                                    </div>
                                                    <div class="col">
                                                        <img src="{{asset('public/user_asset/images/'.$val->image) }}" alt="image" style="width:200px; height:200px;" id="output">   
                                                        <input type="file" name="image" id="image" onchange="loadFile(event)" class="form-control" value="{{$val->image}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12 ml-auto">
                                                <div class="form-row">
                                                    <div class="col">
                                                       <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
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
<script type="text/javascript">
var loadFile = function(event) {
var output = document.getElementById('output');
output.src = URL.createObjectURL(event.target.files[0]);
var profile = document.getElementById('image');
output.val = URL.createObjectURL(event.target.files[0]);
output.onload = function() {
URL.revokeObjectURL(output.src) 
}
};</script>