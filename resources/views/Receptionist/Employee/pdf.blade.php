<html>
<head>
<style type="text/css">
  table{
    width:100%;
    border: 1px solid black;    
    margin-left: auto;
    margin-right: auto;
    font-size: inherit;
    font-family: Times New Roman;
    table-layout: fixed;
  }
  td{
    padding:0px;
    border: px solid black;
  }
  .red{
      text-align: center; 
      color: red; 
      text-decoration: underline;"
    }
</style>  
</head>
<body>
  <table>
     @foreach($user as $key => $val)
    <tr>
      <td rowspan="3" style="text-align: right; vertical-align:bottom;"><img src="{{asset('public/user_asset/images/csirlogo-setting.png')}}" height="60" width="60"></td>
      <td colspan="2" style="text-align: center; vertical-align:bottom;"><!-- सी.एस.आई.आर- हिमालय जैवसंपदा प्रौद्योगिकी संस्थान --></td>      
      <td rowspan="3" style="vertical-align: bottom;"><img src="{{asset('public/user_asset/images/csirlogo.png')}}" height="60" width="60"></td>
    </tr>
    <tr>
      <td colspan="2" style="text-align: center;">CSIR-Institute of Himalayan Bioresource Technology</td>  
    </tr>
    <tr>
      <td colspan="2" style="text-align: center;"><!-- पालमपुर(हि.प्र.)/ -->Palampur(H.P.)</td>
    </tr>
    <tr>
      <td></td>
      <td class="red" colspan="2" style="text-align: center;text-decoration: underline; vertical-align: top;"><h3>Health Center</h3></td>
      <td></td>
    </tr>     
    <tr>
      <td rowspan="5" style="text-align: center;"><img src="{{asset('public/user_asset/images/'.$val->image)}}" height="100" width="110"></td>
      <td></td>
      <td></td>
      <td rowspan="5" style="text-align: center;"><img src="{{asset('public/user_asset/images/qrcode.png')}}" height="100" width="110"></td>
    </tr>
    <tr>
      <td style="text-align: right;"><!-- नाम --> Name:</td>
      <td>&nbsp;<span style="text-transform: capitalize;">{{$val->name}}</span></td>  
      
    </tr>
    <tr>
      <td style="text-align: right;"><!-- आईडी संख्या --> ID No.:</td>
      <td>&nbsp;
          @if( $val->employee_id == "") N/A
                  @else
                  {{ $val->employee_id}}
                  @endif
      </td>    
    </tr>
    <tr>
      <td style="text-align: right;"><!-- जन्म तिथि --> Date of Birth:</td>
      <td>&nbsp;
          @if( $val->dob == "") N/A
                  @else
                  {{ $val->dob}}
                  @endif
      </td>
    </tr>
    <tr>
      <td style="text-align: right;"><!-- रक्त समूह --> Blood Group:</td>
       <td>&nbsp;<span style="text-transform: capitalize;">{{$val->blood_group}}</span></td>     
    </tr>
    <tr>
      <td style="text-align: center;">Signature of Employee</td>
      <td></td>
      <td></td>
      <td style="text-align: center;">Administrative officer</td>
    </tr>
    <tr>
      <td style="text-align: center;"><!-- कर्मचारी का हस्ताक्षर --></td>
      <td></td>
      <td></td>
      <td style="text-align: center;"><!-- प्रशासनिक अधिकारी --></td>
    </tr>
  </table>
  <br>
  <table>
    <tr>
        <td colspan="3" style="text-align: right;"><!-- परिवार के सदस्यों की संख्या --> No. of Family members: </td>
        <td colspan="3">{{$family_member}}</td>
    </tr>
    <tr>
      <td colspan="3" style="text-align: right;"><!-- संपर्क नंबर --> Contact No.: </td>
      <td colspan="3">{{$val->mobile}}</td>
    </tr>
    <tr>
      <td colspan="3" style="text-align: right; "><!-- कर्मचारी का पता --> Employee Address: </td>
      <td colspan="3" style=""><span style="text-transform: capitalize; ">{{$val->employee_address}}</span></td>
    </tr> 
     @endforeach  
    <tr>
      <td></td>     
      <td colspan="4" style="text-align: center;"><img src="{{asset('public/user_asset/images/csirlogo.png')}}" height="100" width="110"></td>
      <td></td>
      
    </tr>
    <tr>
      <td></td>
      <td colspan="4" class="red"><h3><!-- उपयोग के लिए निर्देश  -->Instructions for Use</h3></td>
      <td></td>
    
    </tr>
    <tr>      
      <td colspan="6" style="text-align: center;">In case of loss this card, the fact should be reported immediately to the police and issuing Authority</td>   
    </tr>
    <tr>
      
      <td></td>
      <td colspan="4" style="text-align: center;">Penalty for loss of this card is ₹. 50/-</td>
      <td>
    </tr>
  </table>
</body>
</html>