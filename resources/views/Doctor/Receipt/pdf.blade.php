<html>
<style type="text/css">
table{
  width: 90%;
  border: 2px solid black;
  margin-left: auto;
  margin-right: auto;
  table-layout: fixed;
  font-size: 16px;
    font-family: Times New Roman;
    border-spacing: 0px;
}
td{
  border:px solid black;
    padding: auto;
}
.top{
  border-top: thin solid;
  border-bottom: thin solid;
  border-color: black;
}
</style>
<body>
  <table>
    <br>
    <tr>
      <td rowspan="2" style="text-align: right;"><img src="{{asset('public/user_asset/images/csirlogo-setting.png')}}" height="100" width="100"></td>
      <td colspan="3" style="text-align: center; vertical-align: bottom;">CSIR-INSTITUTE OF HIMALAYAN BIORESOURCE TECHNOLOGY, PALAMPUR</td>
      
      <td rowspan="2" ><img src="{{asset('public/user_asset/images/csirlogo.png')}}" height="100" width="100"></td>      
    </tr>
    <tr>
      <td colspan="3" style="text-align: center;">Post Box No.6 Palampur(H.P.) 176061 INDIA</td>
    </tr>
    <!-- <tr>
      <td colspan="5" style="text-align: center; vertical-align:top;">CSIR-INSTITUTE OF HIMALAYAN BIORESOURCE TECHNOLOGY, PALAMPUR</td>
    </tr>
    <tr>
      <td colspan="5" style="text-align: center;vertical-align:top;">Post Box No.6 Palampur(H.P.) 176061 INDIA</td>
    </tr> -->
     @foreach($receipt as $key =>$val)
    <tr>
        <td colspan="5"style="text-align: center;text-decoration: underline;"><h3>Health Centre</h3></td>   
        </tr>
        <tr>
      <td colspan="3">&nbsp;Registration No.: <span style="text-decoration: underline;">{{$val->registration_no}}</span></td>
      <td colspan="2" style="text-align: center;">Date: <span style="text-decoration: underline;">{{date('Y-m-d', strtotime($val->date))}}</span></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;Name of Patient: <span style="text-decoration: underline;text-transform: capitalize;">{{$val->patient_name}}</span></td>
      <td style="text-align: right;">Age: <span style="text-decoration: underline;">{{$val->age}}</span></td>
      <td style="text-align: center;">Sex: <span style="text-transform: capitalize; text-decoration: underline;">{{$val->gender}}</span></td>
    </tr>
    <tr>
      <!-- <td cellspacing="0" colspan="5"> &nbsp;&nbsp;Diagnosis:<span style="text-decoration: underline;text-transform: capitalize;">{{$val->diagnosis}}</span>________________________________________________________________________________</td>  --> 
      <td cellspacing="0" colspan="5" style="padding-bottom: 9px;">&nbsp;Diagnosis: <span style="text-transform: capitalize; text-decoration: underline;">{{$val->diagnosis}}_______________________________________________________________<span><br></td> 
    </tr>
    <tr style="border-top: 1px solid black;">
      <td class="top">
        <div style="border-right:1px solid black; margin-left: 4px;">
          <b><u>Investigation:</b></u><br>
          Hb<br>
          EST<br>
          CSC<br>
          BT<br>
          CT<br>
          KET<br>
          S.Urea<br>
          Sugar<br>
          U Acid<br>
          CRTN<br>
          <b><u>LIPID PROFILE:</b></u><br>
          Chol<br>
          TGT<br>
          HDL<br>
          <b><u>LIVER FXN TEST:</b></u><br>
          S.Bilerubin<br>
          Direct<br>
          SGOT<br>
          SGPT<br>
          Alkp. Phosph<br>
          T. Protein<br>
          S. Albumin<br>
          S. Globulin<br>
          GGT<br>
          <b><u>URINE:</b></u><br>
          ALB<br>
          Sugar<br>
          M/E<br>
          Sp.Gr.<br>
          Preg.Test<br>
          <b><u>SEROLOGY:</b></u><br>
          R/A Factor<br>
          Widal Test<br>
          VDRL Test<br>
          CRP<br>
          ASO<br>
          MISCELLANOUS<br>
          ECG<br>
          Hb.AC<br>
          <b>X-RAY</b><br>
          <b>ULTRASOUND</b>
        </div>
      </td>
        <td class="top" colspan="4" style="vertical-align: top;">
          Blood pressure : <span>Max:{{json_decode($val->blood_pressure)->bp_max }}</span>, <span>Min:{{json_decode($val->blood_pressure)->bp_min }}</span><br>
          Blood sugar : {{$val->blood_sugar}}<br> 
          Temperature : {{$val->temperature}}<br>
        </td>     
    </tr>
    <tr>
      @endforeach
      <td></td>
      <td colspan="3" style="text-align: center;text-decoration: underline;padding-bottom: 5px;"><!-- हम आपके स्बस्थ होने की कामना करते है| --></td>
      <td style="text-align: center;">Medical officer</td>      
    </tr>
  </table>
  
</body>
</html>