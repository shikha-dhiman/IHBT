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
            <!-- row -->
            <div class="container-fluid">
              <div class="row justify-content-center">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card">
                      <div class="card-body">
                       @if($errors->any())
                        <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">Error-{{$errors->first()}}
                        </div>
                        @endif
                        <div class="">
                          <form class="" action="" method="post" enctype="multipart/form-data">
                          @csrf
                          @foreach($user as $key => $val)
                          <input type="hidden" name="type" value="{{request()->input('type')}}">
                          <input type="hidden" name="employee_type" value="{{$val->employee_type}}">
                           @if($val->employee_type == 'current' || request()->input('type') == 3 || request()->input('type') == 2)
                            <div class="form-group row">
                              <div class="col-lg-12">
                                <div class="form-row">
                                  <div class="col">
                                    <label class="">नाम/Name</label>
                                    <input type="text" class="form-control capt-cls" id="name" name="name" placeholder="Name" onkeydown="return /[A-Za-z ]/i.test(event.key)" value="{{$val->name}}" required>
                                  </div>           
                                  <div class="col">
                                    <label class="">पदनाम/Designation</label>
                                    <input type="text" class="form-control capt-cls" placeholder="Designation" onkeydown="return /[A-Za-z ]/i.test(event.key)" name="designation" value="{{$val->designation}}"required>
                                   </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-lg-12">
                                <div class="form-row">
                                  <div class="col-6">
                                    <label class="">प्रभाग/Division</label>
                                    <input type="text" class="form-control capt-cls" placeholder="Division" name="division" value="{{$val->division}}" required>
                                  </div>
                                  @if(request()->input('type') == 1)
                                  <div class="col">
                                    <label class="">पहचान संख्या/Employee ID</label>
                                    <input type="text" class="form-control capt-cls" placeholder="Employee ID"  name="employee_id" value="{{$val->employee_id}}" required>
                                  </div>
                                  @endif
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <div class="col">
                                            <label class="">ई-मेल/Email
                                        </label>
                                            <input type="email" class="form-control" placeholder="Email" name="email" value="{{$val->email}}" required>
                                        </div>
                                        <div class="col">
                                            <label class="">पासवर्ड/Password
                                        </label>
                                            <input type="password" class="form-control textarea_text" placeholder="Password" value="{{base64_decode($val->password)}}" name="password" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <div class="col">
                                            <label class="">जन्म तिथि/DOB       </label>
                                            <div class="input-group">
                                                <input type="text" class="form-control mydatepicker" placeholder="DOB"  name="dob" value="{{$val->dob}}"> <span class="input-group-append"><span class="input-group-text"><i class="mdi mdi-calendar-check"></i></span></span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="">कर्मचारी का प्रकार/Employee Type</label>
                                            <input type="text" name="" class="form-control capt-cls" id="employee_type" readonly="" value="{{$val->employee_type}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <div class="col-6">
                                            <label class="">उम्र/Age</label>
                                            <input type="text" class="form-control" placeholder="Age"  name="age" value="{{$val->age}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                        </div>
                                        <div class="col">
                                            <label class="sex">लिंग/Sex:</label>
                                            <div class="input-group">
                                              <div class="basic-form">
                                                  <div class="">
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
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <div class="col-6">
                                            <label class="">ब्लड ग्रुप/Blood group</label>
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
                                        <div class="col-6 dateOfRetirement" style="display: none;">
                                            <label class="">सेवानिवृत्ति की तिथि/Date of Retirement</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control mydatepicker" placeholder="Date of Retirement"  name="date_of_retirement" value="{{$val->date_of_retirement}}"> <span class="input-group-append"><span class="input-group-text"><i class="mdi mdi-calendar-check"></i></span></span>
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
                                            <label class="">पता (वर्तमान)/Employee address (Present)</label>
                                            <input type="text" class="form-control textarea_text" placeholder="Address" name="employee_address"  value="{{$val->employee_address}}" id="textarea_text" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <div class="col">
                                            <label class="">मोबाइल नं./Contact No.</label>
                                            <input type="text" class="form-control" placeholder="Contact No."  name="mobile" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="  10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="{{$val->mobile}}" readonly>
                                            
                                        </div>
                                        <div class="col">
                                            <img src="{{asset('public/user_asset/images/'.$val->image) }}" alt="image" style="width:200px; height:200px;" id="output" >
                                            <input type="file" name="image" id="image" onchange="loadFile(event)" class="form-control" value="{{$val->image}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                             <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <div class="col">
                                           <label class="form-lbl3">नाम/Name</label>
                                            <input type="text" class="form-control capt-cls" id="name" name="name" onkeydown="return /[A-Za-z ]/i.test(event.key)" value="{{$val->name}}" required>
                                            
                                        </div>
                                        <div class="col">
                                            <label class="form-lbl3">अधिवर्षिता के समय पदनाम/Designation at the time or retirement</label>
                                            <input type="text" class="form-control capt-cls" onkeydown="return /[A-Za-z ]/i.test(event.key)" name="designation" value="{{$val->designation}}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                      <div class="col">
                                        <label class="form-lbl3">पेंशन भुगतान आदेश संख्या/PPO No.</label>
                                        <input type="text" class="form-control capt-cls" name="ppo_no" value="{{$val->ppo_no}}" required>
                                      </div>
                                        <div class="col">
                                          <label class="form-lbl3">जमा किये गए योगदान का विवरण/Detail of contribution received</label>
                                          <input type="text" class="form-control capt-cls" name="contribution_amt" value="{{$val->cont_amt}}"  required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <div class="col">
                                            <label class="form-lbl3">स्थायी पता/Permanent address</label>
                                            <input type="text" class="form-control textarea_text" name="employee_address"  id="textarea_text" value="{{$val->employee_address}}" required>
                                        </div>
                                        <div class="col">
                                            <label class="form-lbl3">मोबाइल नं./Contact No.</label>
                                            <input type="text" class="form-control"  name="mobile" oninput="this.value = this.value.replace(/[^0-9.]/g, "").replace(/(\..*)\./g, "$1");" maxlength="  10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="{{$val->mobile }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <div class="col">
                                            <label class="form-lbl3">ई-मेल/Email</label>
                                            <input type="email" class="form-control" name="email" value="{{$val->email }}" required>
                                        </div>
                                        <div class="col">
                                            <label class="form-lbl3">पासवर्ड/Password</label>
                                            <input type="password" class="form-control textarea_text" name="password" value="{{$val->password }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <div class="col">
                                            <label class="form-lbl3">ब्लड ग्रुप/Blood group</label>
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
                                        <div class="col">
                                            <label class="form-lbl3">वार्ड पात्रता/Ward Entitlement : (for office use only)</label>
                                         <div><input type="radio" name="ward" value="Yes" checked=""> Yes
                                         <input type="radio" name="ward" value="No" checked=""> No</div>
                                         
                                        </div>
                                    </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                    <div class="col-lg-12">
                                        <div class="form-row">
                                            <div class="col-6">
                                             <label class="form-lbl3">उम्र/Age</label>
                                                <input type="text" class="form-control" name="age" oninput="this.value = this.value.replace(/[^0-9.]/g, "").replace(/(\..*)\./g, "$1");" maxlength="2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="{{$val->age}}" required>
                                            </div>
                                            <div class="col">
                                                <div class="input-group">
                                                    <div class="basic-form">
                                                         <label class="form-lbl3 sex">लिंग/Sex:</label>
                                                        <div class="">
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
                                            <div class="col-lg-12">
                                                <div class="form-row">
                                                    <div class="col-6">
                                                        <img src="{{asset('public/user_asset/images/'.$val->image) }}" alt="image" style="width:200px; height:200px;" id="output" >
                                                        <input type="file" name="image" id="image" onchange="loadFile(event)" class="form-control" value="{{$val->image}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif 
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