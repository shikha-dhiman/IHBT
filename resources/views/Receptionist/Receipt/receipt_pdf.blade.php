<html>
<head>
	<!--<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/design.css') }}">-->
<style type="text/css">
	table{
		border:2px solid ;
		margin-left: auto;
        margin-right: auto;
        font-size: 16px;
        font-family: Times New Roman;
	}
	td{
		border: px solid ;
		padding:auto;
		
	}
</style>	
</head>
<body>
	<br>
	<table>
		<tr>
			<td rowspan="2" style="text-align: right;"><img src="{{asset('public/user_asset/images/csirlogo-setting.png')}}" height="100" width="110"></td>
			<td>CSIR-Institute of himalyan Bioresourse Technology, Palampur</td>
			<td rowspan="2"><img src="{{asset('public/user_asset/images/csirlogo.png')}}" height="100" width="110"></td>
			
		</tr>
		<tr>
			<td style="text-align:center; vertical-align: top;">POST Box No.6 Palampur(HP) 176061 INDIA</td>
		</tr>	
		<tr>
			<td></td>
			<td style="text-align: center;text-decoration: underline;"><h3>Health Center</h3></td>
		</tr>
		<tr>
			<td colspan="2">Registration No.<span style="text-decoration: underline;">{{$registration_no}}</span></td>
			<td>Date:<span style="text-decoration: underline;">{{$date}}</span></td>
		</tr>
		<tr>
			<td colspan="2">Name of Patient:<span style="text-decoration: underline;text-transform: capitalize;">{{$patient_name}}</span></td>
			<td>Age:<span style="text-decoration: underline;">{{$age}}</span> Sex:<span style="text-transform: capitalize; text-decoration: underline;">{{$sex}}</span></td>
		</tr>
		<tr>
			<td colspan="4"> Diagnosis:_______________________________________________________________________</td>		
		</tr>
		<!--------------------------------------next section------------------>
		<tr>
			<td><b>Inspection</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>FIB</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>FST</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>CSC</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>BT</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>CT</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>KET</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>SU</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>SUGAR</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>U ACID</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>CRTN</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td><b>LIQUID PROFILE</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>CHCL</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>TGT</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>HDL</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td><b>LiVER TEST</b></td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>HDL 5 BIO()</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>DIRECT</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>SGOT</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>SGPT</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>AL PH</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>T PROTIEN</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>S ALMOND</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>S GLUCOSE</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>CGT</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td><b>URINT</b></td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>ALB</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>Sugar</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>ME</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>SQ.</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>Pro. Test</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td><b>SEROLOGY</b></td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>RUA FACTOR</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>WIDLE TEST</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>VDRL Test</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>CRP</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>ASO</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>MISCELLANOUS</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>ECG</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td>Hb.AC</td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td><b>X-RAY</b></td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td><b>ULTRASOUND</b></td>
			<td colspan="3"></td>			
		</tr>
		<tr>
			<td></td>
			<td style="text-align: center;text-decoration: underline;">We wish you well.</td>
			<td style="text-align: center;text-decoration: underline;">Medical officer</td>			
		</tr>
	</table>
</body>
</html>