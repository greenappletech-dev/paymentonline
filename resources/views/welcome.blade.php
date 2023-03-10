<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/nha_logo_1.png') }}">
        
	<title>NHA-Epayment</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->  
  <link rel="stylesheet" href="{{ asset('adminlte/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet"  href="{{ asset('adminlte/plugins/iCheck/square/blue.css')}}">
 

<style>
* {
    margin: 0px;
    padding: 0px;
}
html, body {
    height: 100%;
    width: 100%;
    background-color: #ffffff;
    color: #000000;
    font-weight: normal;
    min-width: 500px;
    -ms-overflow-style: -ms-autohiding-scrollbar;
}

#fullPage, #brandingWrapper {
    width: 100%;
    height: 78vh;
    background-color: inherit;
}

#brandingWrapper {
    background-color: #8ac76f;
}
#branding {
	
    height: 100%;
    margin-right:800px;
    margin-left: 0px;
    background-color: inherit;

    background-repeat: no-repeat;
   	
	background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
	
	
	
	
}
.illustrationClass {
    	  background: linear-gradient(0deg, rgba(70, 243, 8, 0.47), rgba(62, 100, 49, 0.47)), url({{asset('/image/nha_background.jpg')}});
		    background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
		
        
		
}
#contentWrapper {
    position: relative;
    width: 800px;
    height: 78vh;
    overflow: auto;
    background-color: #000;
    margin-left: -800px;
    margin-right: 0px;
}


.float {
    float: left;
}

.margin-2{
	
	margin: 100px
}

#content {
    min-height: 100%;
    height: auto !important;

}

.divider{
	
	padding-bottom:8vh;
}

.login-box-header4 {
    display: block;
    font-size: 16px;
    font-weight: bolder;
	color:#3c3a3a;
}
.login-box-header3 {
    display: block;
    font-size: 35px;
    font-weight: 700;
	color:#000;
    margin-bottom: 5px !important;
}


.large-space{
	
	font-size: 17px;
	padding-top:25vh;
	
	
}

.login-box-body, .register-box-body {
    background: #000 !important;
    padding: 20px;
    border-top: 0;
    color: #666;
}

.btn-green {
  color: #000;
  background-color: #38a039;
  border-color: #428043;
 
 line-height: 1.6; 
  font-size: 18px !important;
 font-weight: 700 !important;
  
}
.btn-green:focus,
.btn-green.focus {
  color: #000;
  background-color: #82d883;
  border-color: #8fd290;
}
.btn-green:hover {
  color: #000;
  background-color: #82d883;
  border-color: #8fd290;
}
.btn-green:active,
.btn-green.active,
.open > .dropdown-toggle.btn-green {
  color: #000;
  background-color: #82d883;
  border-color: #82d883;
}
.btn-green:active:hover,
.btn-green.active:hover,
.open > .dropdown-toggle.btn-green:hover,
.btn-green:active:focus,
.btn-green.active:focus,
.open > .dropdown-toggle.btn-green:focus,
.btn-green:active.focus,
.btn-green.active.focus,
.open > .dropdown-toggle.btn-green.focus {
  color: #000;
    background-color: #82d883;
  border-color: #8fd290;
}
.btn-green:active,
.btn-green.active,
.open > .dropdown-toggle.btn-green {
  background-image: none;
}
.btn-green.disabled:hover,
.btn-green[disabled]:hover,
fieldset[disabled] .btn-green:hover,
.btn-green.disabled:focus,
.btn-green[disabled]:focus,
fieldset[disabled] .btn-green:focus,
.btn-green.disabled.focus,
.btn-green[disabled].focus,
fieldset[disabled] .btn-green.focus {
  background-color: #38a039;
  border-color: #8fd290;
}
.btn-green .badge {
  color: #000;
  background-color: #38a039;
}

.checkbox input[type=checkbox], .checkbox-inline input[type=checkbox], .radio input[type=radio], .radio-inline input[type=radio] {
    position: absolute;
    margin-left: 0px !important; 
}

.icheck > label {
    padding-left: 20px !important; 
}


	.center-text {
        position: absolute;
        top: 40%;
        left: 25%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 70px;
        font-weight: 600;
    }
	
	.main-footer2 {
		background: #fff !important;
		padding: 15px;
		color: #fff;
		border-top: 1px solid #d2d6de;
		min-height: 160px;
		z-index: 820;
	}
	.main-footer3 {
		background: #0b0389  !important;
		padding: 10px;
		color: #ff;
		border-top: 1px solid #d2d6de;
		min-height: 10px;
		z-index: 820;
	}
	.text {
		position: relative;
		width: 80px;
		height: 25px;
		font-style: normal;
		font-weight: 500;
		font-size: 20px;
		line-height: 30px;
		text-align: center !important;
		color: #0E723E;
		
	}
	.link{
		font-size: 17px;
		color: #fff !important;
	}
	
    .welcome-button {
        padding: 15px 50px;
        border: none;
        border-collapse: collapse;
        border-radius: 2px; !important;
        color: white;
        background: #0d6aaa;
        font-size: 40px;
		font-weight : 600;
        outline: none;
    }
	
	.positionbutton{
		margin-top:160px
	}
	
	
	
	 @media screen and (max-width: 1500px){
		
		.center-text {
			position: absolute;
			top: 40%;
			left: 25%;
			transform: translate(-50%, -50%);
			color: white;
			font-size: 60px;
			font-weight: 600;
		}
	}
	
	 @media screen and (max-width: 1300px){
		
		.center-text {
			position: absolute;
			top: 40%;
			left: 20%;
			transform: translate(-50%, -50%);
			color: white;
			font-size: 50px;
			font-weight: 600;
		}
	}
	
</style>
  
</head>
<body class="hold-transition login-page body">


<div id="fullPage">

	<div id="brandingWrapper" class="float">
		<div id="branding" class="illustrationClass">
			<div class="center-text">
				We offer the most <br>
				affordable services
			</div>
		</div>
	</div>
		
		
    <div id="contentWrapper" class="float">
		<div id="row">
		<div class="col-lg-12">

				<div class="margin-2">
			  
			  
			  
					<table width="100%" border="0">
						<tr>
							<td><img src="{{ asset('image/nha_logo_1_140.png') }}" alt=""></td>
							<td><img src="{{ asset('image/nha_logo_2_140.png') }}" alt=""></td>
							<td><img src="{{ asset('image/GA_logo_180.png') }}" alt=""></td>
						</tr>
					</table>
	
					<div class="positionbutton">
						<button onclick="location.href='information'" class="welcome-button" style="width:100%">PAY NOW</button>
						<br>
						<br>
						<button onclick="location.href='portal'" class="welcome-button" style="width:100%">CHECK PAYMENTS</button>
					</div>
				
			 
				
				
				

				
				
				</div>
		</div>
		</div>
	</div> 
	

	
</div>

<footer class="main-footer2">
		 <div class="col-lg-12">
		 
		 
			<div class="col-lg-4 green_apple">
				<center>
					<div style="display:block"><img src="{{ asset('images/green_apple.png') }}"></div>
					<span class="text">© 2022 Green Apple Technologies and Systems, Inc</span>
				</center>
			</div>
			
			<div class="col-lg-4" style="margin-top:30px">
				<center>
					<span class="text">Unit 16A Petron Mega Plaza</span><br>
					<span class="text">358 Sen. Gil. J. Puyat Avenue</span><br>
					<span class="text">Bel-air, Makati City</span><br>
				</center>
			</div>
			<div class="col-lg-4" style="margin-top:30px">
				<center>
					<span class="text">Customer hotline : +63 927 522 9568</span><br>
					<span class="text">Green Apple Tel. No: +63 8 681 9680</span><br>
					<span class="text">Inquire : inquiry@greenappletech.ph</span><br>
				</center>
			</div>
		</div>
  </footer>
  <footer class="main-footer3">
    <div class="container">
      <center><strong><a href="javascript:void(0)" class="link" id="privacy-policy">Privacy Policy</a>&nbsp;&nbsp;<span class="link">|</span>&nbsp;&nbsp;<a href="javascript:void(0)" class="link" id="Transaction-Security">Transaction Security</a></strong></center>
	</div>
  </footer>


<!-- load jQuery and jQuery UI -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<!-- jQuery 2.2.3 -->
<script  src="{{ asset('adminlte/plugins/jQuery/jquery-2.2.3.min.js')}}" ></script>
<!-- Bootstrap 3.3.6 -->
<script  src="{{ asset('adminlte/bootstrap/js/bootstrap.min.js')}}" ></script>




<div id="privacy-policy-form" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Privacy Policy</h4>
		  </div>
		  <div class="modal-body">
			<div class="box-body">
			
				<div style="line-height:20px;font-size:15px">
				<h2 style="margin-bottom:25px">Green Apple Technologies and Systems, Inc. Privacy Policy</h2>
			
				<p>Green Apple Technologies and Systems Inc. (GATSI) follows the data privacy principles of transparency, legitimate purpose, and proportionality. In order to comply with the requirements of the Data Privacy Act, this Privacy Policy controls the gathering, processing, storage, and dissemination of Personal Information of the Beneficiary when conducting business with GATSI.</p>
				
				
				
				<p><b>A. Collection of Personal Data</b></p>
				
				<p>GATSI gathers personal and sensitive personal information such as name, age, and address from our channel partners, suppliers, customers, and visitors thru physical and/or digital means.</p>
				
				<p><b>B.  Use of Personal Data</b></p>
				
				<p>GATSI processes and analyzes information that the Beneficiary provides in order to, (1) monitor and record payment/collection history of amortization and other payable services of NHA entrusted to GATSI, (2) enable GATSI to accept bill payments according to the Beneficiary’s preferred payment mode, (3) respond to the Beneficiary’s inquiry, and (4) all other purposes in connection with GATSI’s services.</p>
				
				<p><b>C. Limitation of Access</b></p>
				
				<p>Personal Information may only be shared, (1) when GATSI has the Beneficiary’s consent (provided that the use or processing of Personal Information is compatible with the purpose for which the same was collected), (2) where it is necessary to meet the purposes for which such Beneficiary has provided the Personal Information.</p>
				
				<p><b>D. Disclosure of Personal Data to Third Parties</b></p>
				
				<p>Personal Information shall not be disclosed to Third Parties outside the organization other than (1) necessary to fulfill the Beneficiary’s request, (2) upon receipt of written authorization from the Beneficiary in cases where GATSI has hired a third party particularly to support its operations. Any agreement shall be covered by Non-disclosure Agreement.</p>
				
				<p><b>E. Security and Protection of Personal Data</b></p>
				
				<p>GATSI has taken necessary precautions to implement reasonable and appropriate security measures to protect Personal Information against any unauthorized destructions, modifications, and disclosure, and against any unlawful processing.</p>
				
				<p><b>F. Retention of Personal Data</b></p>
				
				<p>GATSI will store Personal Information for as long as necessary. Afterward, the Personal Information shall be deleted and made unrecoverable using approved secure disposal methods. This includes physical media.</p>
				</div>

                
            </div>  
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		 
		</div>
	  </div>
 </div>
<!-- /.content -->

<div id="Transaction-Security-form" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Transaction Security</h4>
		  </div>
		  <div class="modal-body">
			<div class="box-body">
			
		
			
			<p style="line-height:30px;font-size:16px">
			The platform at <a href="nha-payment.greenappletechph.com">nha-payment.greenappletechph.com</a> is made to be as easy to use as possible while also offering the highest level of security and privacy for all your information. The greatest software now available for secure business transactions is our secure server software (SSL), which is the industry standard. Your credit card number, name, and address are all encrypted so that they cannot be read when they are transmitted over the Internet. Your credit card data is never saved on our servers. We use DigitalOcean technologies that complies with encryption technologies such as MNSR, SSH, V4 authentication, LUKS, and TSL. We are using advanced technologies to encrypt any data and information submitted to us, and our website has security measures in place to guard against the loss, misuse, and modification of any data and information that we receive. We consistently work to strengthen our security procedures and protect the privacy of any such data and information.</p>
                
            </div>  
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		 
		</div>
	  </div>
 </div>
<!-- /.content -->


<script>
$(document).on('click','#privacy-policy',function(e){
	var options = { backdrop : 'static'}
	$('#privacy-policy-form').modal(options); 
});
</script>

<script>
$(document).on('click','#Transaction-Security',function(e){
	var options = { backdrop : 'static'}
	$('#Transaction-Security-form').modal(options); 
});
</script>

</body>
</html>