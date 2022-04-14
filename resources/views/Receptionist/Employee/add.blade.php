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
                        @if(request()->input('type') == 1)
                        <li class="breadcrumb-item active"><a href="{{url('receptionist_user/employee?type=1')}}" class="capt-cls">Employees</a></li>
                        @endif
                        @if(request()->input('type') == 2)
                        <li class="breadcrumb-item active"><a href="{{url('receptionist_user/receptionist?type=2')}}" class="capt-cls">Receptionist</a></li>
                        @endif
                        @if(request()->input('type') == 3)
                        <li class="breadcrumb-item active"><a href="{{url('receptionist_user/doctor?type=3')}}" class="capt-cls">Doctor</a></li>
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
                                    <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;"><!-- {{$errors->first()}} -->Error-{{$errors->first()}}
                                    </div>
                                @endif
                                <div class="">
                                <form class="" action="" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="url" value="{{str_replace(url('/'), '', url()->previous())}}">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                           <div class="tab">
                                              <p class="tablinks tabactive" id="serving">Serving</p>
                                              <p class="tablinks" id="retired">Retired</p>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="employee_type" value="current">
                                    <div class="serving">
                                    </div>
                                    <div class="retired">
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
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var html='';
     html+='<div class="form-group row">';
            html+='<div class="col-lg-12">';
                 html+='<div class="form-row">';
                    html+='<label class="form-lbl">नाम/Name</label>';
                     html+='<div class="col">';
                        html+='<input type="text" class="form-control capt-cls" id="name" name="name" onkeydown="return /[A-Za-z ]/i.test(event.key)" required>';
                      html+='</div>';
                     html+='<label class="form-lbl2">पदनाम/Designation</label>';
                     html+='<div class="col">';
                        html+='<input type="text" class="form-control capt-cls" onkeydown="return /[A-Za-z ]/i.test(event.key)" name="designation" required>';
                     html+='</div>';
                 html+='</div>';
             html+='</div>';
        html+='</div>';
        html+='<div class="form-group row">';
            html+='<div class="col-lg-12">';
                html+='<div class="form-row">';
                    html+='<label class="form-lbl">प्रभाग/Division</label>';
                    html+='<div class="col">';
                        html+='<input type="text" class="form-control capt-cls" name="division" required>';
                    html+='</div>';
                    html+='<label class="form-lbl2">पहचान संख्या/Employee ID</label>';
                    html+='<div class="col">';
                        html+='<input type="text" class="form-control capt-cls" name="employee_id" required>';
                    html+='</div>';
                html+='</div>';
            html+='</div>';
        html+='</div>';
        html+='<div class="form-group row">';
            html+='<div class="col-lg-12">';
               html+='<div class="form-row">';
                   html+='<label class="form-lbl">मोबाइल नं./Contact No.</label>';
                    html+='<div class="col">';
                        html+='<input type= "text" class="form-control"  name="mobile" oninput="this.value = this.value.replace(/[^0-9.]/g, "").replace(/(\..*)\./g, "$1");" maxlength="  10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>';
                    html+='</div>';
                    html+='<label class="form-lbl2">प्रोफ़ाइल छवि/Profile image</label>';
                    html+='<div class="col">';
                        html+='<input type="file" name="image" id="profile_image" class="form-control" required>';
                    html+='</div>';
                html+='</div>';
            html+='</div>';
        html+='</div>';
        html+='<div class="form-group row">';
            html+='<div class="col-lg-12">';
                html+='<div class="form-row">';
                    html+='<label class="form-lbl">ई-मेल/Email</label>';
                    html+='<div class="col">';
                        html+='<input type="email" class="form-control" name="email" required>';
                    html+='</div>';
                    html+='<label class="form-lbl2">पासवर्ड/Password</label>';
                    html+='<div class="col">';
                        html+='<input type="password" class="form-control textarea_text" name="password" required>';
                    html+='</div>';
                html+='</div>';
            html+='</div>';
        html+='</div>';
         html+='<div class="form-group row">';
            html+='<div class="col-lg-12">';
                html+='<div class="form-row">';
                     html+='<label class="form-lbl">जन्म तिथि/DOB</label>';
                    html+='<div class="col">';
                        html+='<div class="input-group">';
                            html+='<input type="text" class="form-control mydatepicker" name="dob"> <span class="input-group-append"><span class="input-group-text"><i class="mdi mdi-calendar-check"></i></span></span>';
                        html+='</div>';
                    html+='</div>';
                    html+='<label class="form-lbl2">ब्लड ग्रुप/Blood group</label>';
                    html+='<div class="col-6">';
                        html+='<select class="form-control capt-cls" name="blood_group" required>';
                        html+='<option value="A+">A+</option><option value="A-">A-</option>';
                        html+='<option value="B+">B+</option><option value="B-">B-</option>';
                        html+='<option value="O+">O+</option><option value="O-">O-</option>';
                        html+='<option value="AB+">AB+</option><option value="AB-">AB-</option>';
                        html+='<option value="Unknown">Unknown</option>';
                        html+='</select>';
                    html+='</div>';
                html+='</div>';
           html+='</div>';
        html+='</div>';
        html+='<div class="form-group row">';
            html+='<div class="col-lg-12">';
                html+='<div class="form-row">';
                     html+='<label class="form-lbl">उम्र/Age</label>';
                    html+='<div class="col-6">';
                        html+='<input type="text" class="form-control" name="age" oninput="this.value = this.value.replace(/[^0-9.]/g, "").replace(/(\..*)\./g, "$1");" maxlength="2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>';
                    html+='</div>';
                    html+='<div class="col">';
                        html+='<div class="input-group">';
                            html+='<div class="basic-form">';
                             html+='<label class="sex form-lbl">लिंग/Sex:</label>';
                                html+='<div class="col">';
                                    html+='<label class="radio-inline mr-3">';
                                        html+='<input type="radio" name="gender" value="male" checked> Male</label>';
                                    html+='<label class="radio-inline mr-3">';
                                        html+='<input type="radio" name="gender" value="female"> Female</label>';
                                html+='</div>';
                            html+='</div>';
                        html+='</div>';
                    html+='</div>';
                html+='</div>';
            html+='</div>';
        html+='</div>';
        html+='<div class="form-group row">';
            html+='<div class="col-lg-12">';
                html+='<div class="form-row">';
                    html+='<label class="form-lbl">पता (वर्तमान)/Employee address (Present)</label>';
                    html+='<div class="col">';
                        html+='<input type="text" class="form-control textarea_text" name="employee_address"  id="textarea_text" required>';
                    html+='</div>';

                html+='</div>';
            html+='</div>';
        html+='</div>';
        html+='<div class="form-group row">';
            html+='<div class="col-lg-12">';
                html+='<div class="form-row">';
                    html+='<label class="form-lbl">वार्ड पात्रता/Ward Entitlement : (for office use only)</label>';
                    html+='<div class="col">';
                     html+='<input type="radio" name="ward" value="Yes" checked=""> Yes';
                     html+='<input type="radio" name="ward" value="No" checked=""> No';
                    html+='</div>';
                html+='</div>';
            html+='</div>';
        html+='</div>';
    html+='</div>';
    var retired = '';
    retired+='<input type="hidden" name="employee_type" value="retired">';
    retired+='<div class="form-group row">';
        retired+='<div class="col-lg-12">';
            retired+='<div class="form-row">';
                retired+='<label class="form-lbl">नाम/Name</label>';
                retired+='<div class="col">';
                   retired+='<input type="text" class="form-control capt-cls" id="name" name="name" onkeydown="return /[A-Za-z ]/i.test(event.key)" required>';
                 retired+='</div>';
                 retired+='<label class="form-lbl2">अधिवर्षिता के समय पदनाम/Designation at the time or retirement</label>';
                retired+='<div class="col">';
                    retired+='<input type="text" class="form-control capt-cls" onkeydown="return /[A-Za-z ]/i.test(event.key)" name="designation" required>';
                retired+='</div>';
            retired+='</div>';
        retired+='</div>';
    retired+='</div>';
    retired+='<div class="form-group row">';
        retired+='<div class="col-lg-12">';
            retired+='<div class="form-row">';
                retired+='<label class="form-lbl">पेंशन भुगतान आदेश संख्या/PPO No.</label>';
                retired+='<div class="col">';
                    retired+='<input type="text" class="form-control capt-cls" name="ppo_no" required>';
                retired+='</div>';
                retired+='<label class="form-lbl2">जमा किये गए योगदान का विवरण/Detail of contribution received</label>';
                retired+='<div class="col">';
                    retired+='<input type="text" class="form-control capt-cls" name="contribution_amt" required>';
                retired+='</div>';
            retired+='</div>';
        retired+='</div>';
    retired+='</div>';
    retired+='<div class="form-group row">';
        retired+='<div class="col-lg-12">';
            retired+='<div class="form-row">';
                retired+='<label class="form-lbl">स्थायी पता/Permanent address</label>';
                retired+='<div class="col">';
                    retired+='<input type="text" class="form-control textarea_text" name="employee_address"  id="textarea_text" required>';
                retired+='</div>';
                retired+='<label class="form-lbl2">मोबाइल नं./Contact No.</label>';
                retired+='<div class="col">';
                    retired+='<input type="text" class="form-control"  name="mobile" oninput="this.value = this.value.replace(/[^0-9.]/g, "").replace(/(\..*)\./g, "$1");" maxlength="  10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>';
                retired+='</div>';
            retired+='</div>';
        retired+='</div>';
    retired+='</div>';
    retired+='<div class="form-group row">';
        retired+='<div class="col-lg-12">';
            retired+='<div class="form-row">';
                retired+='<label class="form-lbl">ई-मेल/Email</label>';
                retired+='<div class="col">';
                   retired+=' <input type="email" class="form-control" name="email" required>';
                retired+='</div>';
                retired+='<label class="form-lbl2">पासवर्ड/Password</label>';
                retired+='<div class="col">';
                    retired+='<input type="password" class="form-control textarea_text" name="password" required>';
                retired+='</div>';
            retired+='</div>';
        retired+='</div>';
    retired+='</div>';
    retired+='<div class="form-group row">';
        retired+='<div class="col-lg-12">';
            retired+='<div class="form-row">';
                retired+='<label class="form-lbl">ब्लड ग्रुप/Blood group</label>';
                retired+='<div class="col">';
                   retired+=' <select class="form-control capt-cls" name="blood_group" required>';
                    retired+='<option value="A+">A+</option><option value="A-">A-</option>';
                    retired+='<option value="B+">B+</option><option value="B-">B-</option>';
                    retired+='<option value="O+">O+</option><option value="O-">O-</option>';
                    retired+='<option value="AB+">AB+</option><option value="AB-">AB-</option>';
                    retired+='<option value="Unknown">Unknown</option>';
                    retired+='</select>';
                retired+='</div>';
                retired+='<label class="form-lbl2">वार्ड पात्रता/Ward Entitlement : (for office use only)</label>';
                retired+='<div class="col">';
                 retired+='<input type="radio" name="ward" value="Yes" checked=""> Yes';
                 retired+='<input type="radio" name="ward" value="No" checked=""> No';
                retired+='</div>';
            retired+='</div>';
        retired+='</div>';
    retired+='</div>';
       /********************new field add*************************************/

        retired+='<div class="form-group row">';
            retired+='<div class="col-lg-12">';
                retired+='<div class="form-row">';
                    retired+='<div class="col-6">';
                     retired+='<label class="form-lbl">उम्र/Age</label>';
                        retired+='<input type="text" class="form-control" name="age" oninput="this.value = this.value.replace(/[^0-9.]/g, "").replace(/(\..*)\./g, "$1");" maxlength="2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>';
                    retired+='</div>';
                    retired+='<div class="col">';
                        retired+='<div class="input-group">';
                            retired+='<div class="basic-form">';
                            retired+='<label class="form-lbl sex">लिंग/Sex:</label>';
                                retired+='<div class="">';
                                    retired+='<label class="radio-inline mr-3">';
                                        retired+='<input type="radio" name="gender" value="male" checked> Male</label>';
                                    retired+='<label class="radio-inline mr-3">';
                                        retired+='<input type="radio" name="gender" value="female"> Female</label>';
                                retired+='</div>';
                            retired+='</div>';
                        /*retired+='</div>';*/
                    retired+='</div>';
                retired+='</div>';
    retired+='</div>';
    retired+='</div>';
    retired+='</div>';
    retired+='<div class="form-group row">';
    retired+='<div class="col-lg-12">';
        retired+='<div class="form-row">';
            retired+='<label class="form-lbl">प्रोफ़ाइल छवि/Profile image</label>';
            retired+='<div class="col-6">';
                retired+='<input type="file" name="image" id="profile_image" class="form-control" required="">';
            retired+='</div>';
       retired+=' </div>';
   retired+=' </div>';
retired+='</div>';
    $('.serving').html(html);
    $('.retired').html("");
    $(".tablinks").click(function(){
        var tabid = $(this).attr('id'); 
        /*alert(tabid);*/
        if(tabid == 'serving'){
            $('#retired').removeClass('tabactive');
            $('#'+tabid).addClass('tabactive');
            $('.serving').html(html);
            $('.retired').html("");
        }else if(tabid == 'retired' ){
            $('#serving').removeClass('tabactive');
            $('#'+tabid).addClass('tabactive');
            $('.retired').html(retired);
            $('.serving').html("");
        }
    });
  document.querySelector('#textarea_text').addEventListener('input', () => {
    text = document.querySelector('#textarea_text').value;
    document.querySelector('#textarea_text').value = text.charAt(0).toUpperCase() + text.slice(1);
    })
});
</script>
       