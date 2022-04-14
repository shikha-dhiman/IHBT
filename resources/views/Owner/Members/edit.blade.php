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
                        <li class="breadcrumb-item active"><a href="{{url('owner/employees?type=1')}}" class="capt-cls">Employees</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('owner/employee/family?id='.request()->input('id').'&type='.request()->input('type'))}}" class="capt-cls">Family</a></li>
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
                                    <form class="" action="" method="post">
                                        @csrf
                                        @foreach($family_member as $key => $val)
                                        <input type="hidden" name="url" value="{{str_replace(url('/'), '', url()->previous())}}">
                                        <h4 class="card-title capt-cls"></h4>
                                         <div class="form-group row">
                                            <div class="col-lg-12">
                                                <div class="form-row">
                                                    <input type="hidden" name="user_id" value="{{request()->input('id')}}">
                                                    <div class="col">
                                                       <input type="text" class="form-control capt-cls" id="name" name="name" value="{{$val->name}}" placeholder="Name" onkeydown="return /[A-Za-z ]/i.test(event.key)" required>
                                                     </div>
                                                     <div class="col">
                                                        <input type="text" class="form-control capt-cls" placeholder="Relation" onkeydown="return /[A-Za-z ]/i.test(event.key)" name="relation" value="{{$val->relation}}" required>
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
                                                        <select class="form-control capt-cls" name="blood_group" placeholder="Blood Group" required>
                                                        <option value="A+" {{$val->blood_group == 'A+' ? 'selected':''}}>A+</option>

                                                        <option value="A-" {{$val->blood_group == 'A-' ? 'selected':''}}>A-</option>

                                                        <option value="B+" {{$val->blood_group == 'B+' ? 'selected':''}}>B+</option>

                                                        <option value="B-" {{$val->blood_group == 'B-' ? 'selected':''}}>B-</option>

                                                        <option value="O+" {{$val->blood_group == 'O+' ? 'selected':''}}>O+</option>

                                                        <option value="O-" {{$val->blood_group == 'O-' ? 'selected':''}}>O-</option>

                                                        <option value="AB+" {{$val->blood_group == 'AB+' ? 'selected':''}}>AB+</option>

                                                        <option value="AB-" {{$val->blood_group == 'AB-' ? 'selected':''}}>AB-</option>
                                                        
                                                        <option value="Unknown" {{$val->blood_group == 'Unknown' ? 'selected':''}}>Unknown</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <div class="form-row">
                                                    <div class="col-6">
                                                        <input type="text" class="form-control" placeholder="Age"  name="age" value="{{$val->age}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                                    </div>
                                                    <div class="col">
                                                        <div class="input-group">
                                                            <label class="sex">Sex:</label>
                                                            <div class="basic-form">
                                                                <div class="form-group">
                                                                    <label class="radio-inline mr-3">
                                                                        <input type="radio" name="gender" value="male" {{$val->sex == 'male'? 'checked' : ''}}> Male</label>
                                                                    <label class="radio-inline mr-3">
                                                                        <input type="radio" name="gender" value="female" {{$val->sex == 'female'? 'checked' : ''}}> Female</label>
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
       