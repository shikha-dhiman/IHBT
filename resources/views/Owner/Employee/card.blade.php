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
                           @foreach($user as $key => $val)
                          <div class="col-sm-4 div-pdf">
                              <a href="{{url('owner/employees/card-pdf?id='.$val->id)}}"><img src="
                              {{asset('user_asset/images/pdf-file.png')}}" alt="" style="height: 40px;"></a>
                          </div>
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-lg-12 swasthya-card-body" style="display: flex;">
                                                <div class="col-sm-2" style="text-align: right;"><img src="
{{asset('user_asset/images/csirlogo-setting.png')}}" alt="" style="height: 57px;"></div>
                                                <div class="col-sm-8" style="text-align: center;">सी.एस.आई.आर- हिमालय जैवसंपदा प्रौद्योगिकी संस्थान<br>
                                                CSIR - Institute of Himalayan Bioresource Technology<br>
                                                पालमपुर(हि.प्र.)/Palampur(H.P.)
                                            </div>
                                                <div class="col-sm-2" style="text-align: left;"><img src="
{{asset('user_asset/images/csirlogo.png')}}" alt="" style="height: 57px;"></div>
                                            </div>
                                            <div class="col-lg-12 swasthya-card">
                                               <div class="col-sm-12">
                                                स्वास्थ्य कार्ड Health Card
                                               </div>
                                            </div>
                                            <div class="col-lg-12" style="display: flex;">
                                               <div class="col-sm-3 sanjay-div">
                                                <img src="
{{asset('user_asset/images/'.$val->image)}}" alt="">
                                               </div>
                                               <div class="col-sm-3 sanjay-detail">
                                                <ul>
                                                    <li class="left-li">नाम Name:</li>
                                                    <li class="left-li">आईडी संख्या ID No.:</li>
                                                    <li class="left-li">जन्म तिथि Date of Birth:</li>
                                                    <li class="left-li">रक्त समूह Blood Group:</li>
                                                </ul>
                                               </div>
                                               <div class="col-sm-3">
                                                <ul class="detail-list">
                                                    <li class="capt-cls">{{$val->name}}</li>
                                                    <li>@if($val->employee_id)
                                                      {{$val->employee_id}}
                                                      @else 
                                                      N/A
                                                      @endif
                                                    </li>
                                                    <li>@if($val->dob)
                                                      {{$val->dob}} @else 
                                                      N/A
                                                      @endif</li>
                                                    <li class="capt-cls">{{$val->blood_group}}</li>
                                                </ul>
                                               </div>
                                               <div class="col-sm-3 sanjay-qr">
                                                <img src="
{{asset('user_asset/images/qrcode.png')}}" alt="">
                                               </div>
                                            </div>
                                            <div class="col-lg-12 signature-div">
                                               <div class="col-sm-6" style="padding-left: 68px;">
                                                Signature of Employee <br>
                                                कर्मचारी का हस्ताक्षर
                                               </div>
                                               <div class="col-sm-6" style="padding-left: 195px;">
                                                Administrative Officer<br>
                                                प्रशासनिक अधिकारी
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                          <div class="col-lg-12" style="display: flex;">
                                            <div class="col-sm-6" style="text-align: end;">
                                              <ul>
                                                <li>परिवार के सदस्यों की संख्या No. of Family Members:</li>
                                                <li>संपर्क नंबर Contact No.</li>
                                                <li>कर्मचारी का पता Employee address</li>
                                              </ul>
                                            </div>
                                            <div class="col-sm-6">
                                              <ul>
                                                <li>{{$family_member}}</li>
                                                <li>{{$val->mobile}}</li>
                                                <li class="capt-cls">{{$val->employee_address}}</li>
                                              </ul>
                                              @endforeach
                                            </div>
                                          </div>
                                          <div class="col-lg-12" style="text-align: center;">
                                            <img src="
{{asset('user_asset/images/csirlogo.png')}}" alt="" style="height: 104px;">
                                          </div>
                                          <div class="col-lg-12 swasthya-card" style="top:25px;">उपयोग के लिए निर्देश Instructions for Use</p>
                                          </div>
                                          <div class="col-lg-12" style="text-align: center; padding-top: 10px;">
                                            <p>In case of loss of this card, the fact should be reported immediately to the police and issuing Authority</p>
                                          </div>
                                          <div class="col-lg-12" style="text-align: center; margin-top: -12px;">
                                            <p>Penalty for loss of this card is ₹. 50/-</p>
                                          </div>
                                        </div>
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