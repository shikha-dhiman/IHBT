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
                        <li class="breadcrumb-item active"><a href="{{url('owner/doctor?'.request()->input('type'))}}" class="capt-cls">Employees</a></li>
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
                                        <input type="hidden" name="url" value="{{str_replace(url('/'), '', url()->previous())}}">
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <div class="form-row">
                                                    <div class="col">
                                                       <input type="text" class="form-control capt-cls" id="name" name="name" placeholder="Name" onkeydown="return /[A-Za-z ]/i.test(event.key)" required>
                                                     </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control capt-cls" placeholder="Designation" onkeydown="return /[A-Za-z ]/i.test(event.key)" name="designation" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <input type="text" class="form-control capt-cls" placeholder="Division" name="division" required>
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control capt-cls" placeholder="Employee ID"  name="employee_id" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="Contact No."  name="mobile" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="  10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                                       
                                                    </div>
                                                    <div class="col">
                                                        <input type="file" name="image" id="profile_image" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                            <div class="col-lg-12">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="No. of Fmaily members(dependents)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="family_member">
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                                                    </div>
                                                    <div class="col">
                                                        <input type="password" class="form-control textarea_text" placeholder="Password" name="password" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <div class="col-lg-12">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control mydatepicker" placeholder="DOB"  name="dob"> <span class="input-group-append"><span class="input-group-text"><i class="mdi mdi-calendar-check"></i></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <select title="Employee Type" class="form-control" name="employee_type" id="employee_type">
                                                            <option value="current">Current</option>
                                                            <option value="retired">Retired</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <div class="form-row">
                                                    <div class="col-6">
                                                        <input type="text" class="form-control capt-cls" placeholder="Blood Group"  name="blood_group" required>
                                                    </div>
                                                    <div class="col dateOfRetirement" style="display: none;">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control mydatepicker" placeholder="Date of Retirement"  name="date_of_retirement"> <span class="input-group-append"><span class="input-group-text"><i class="mdi mdi-calendar-check"></i></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <input type="text" class="form-control textarea_text" placeholder="Address" name="employee_address"  required>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12 ml-auto">
                                                <div class="form-row">
                                                    <div class="col">
                                                       <button type="submit" class="btn btn-primary">Submit</button>
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
        <script type="text/javascript">
            document.querySelector('.textarea_text').addEventListener('input', () => {
  text = document.querySelector('.textarea_text').value;
  document.querySelector('.textarea_text').value = text.charAt(0).toUpperCase() + text.slice(1);
})
        </script>
       