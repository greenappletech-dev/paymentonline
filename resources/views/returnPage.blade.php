<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/images/dlb_logo_water.png') }}">
        
        <title>NHA-Epayment</title>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600;800&display=swap" rel="stylesheet">
        
    </head>
    <body>
        
        <style>
            unicode-range: U+1F00-1FFF;
            }
            .mob_view{
                display:none;
            }
            
            body {
                background: linear-gradient(0deg, rgba(70, 243, 8, 0.47), rgba(62, 100, 49, 0.47)), url({{asset('image/nha_background.jpg')}});
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                /* height:100%; */
            }
            .con{
                width:550px;
            }
            .footers{
                font-size: 13px;
                position: absolute;
                bottom: -240px;
                background: #dfe6e9;
                padding: 1px;
                width: 100%;
                border-top: 1px solid #b2bec3;
                color: #636e72;
            }
          
            .con{
                width:40%;
                padding:25px;
            }
            .footers{
                font-size: 13px;
                position: absolute;
                bottom: -650px;
                background: #dfe6e9;
                padding: 1px;
                width: 100%;
                border-top: 1px solid #b2bec3;
                color: #636e72;
            }
            }
        </style>
		
		<style scoped>
			.post{
				margin-top:-90px;
				padding:0px;

			}
			.desktop{
				width:70px;
			}
			/* img{
				width:100px;
			} */
			@media screen and (max-width:1199px) {
				h3{
					display:none;
				}
				.post{
				margin-top:0px;
				padding:0px;

			}
			   
					}
		</style>

        <div class="d-flex align-items-center justify-content-center" style="height:100vh">
			
			<div class="con" style="border: 1px solid #9E9E9E; border-radius: 10px; background: white">
					 <div class="post">
						<div class="d-flex justify-content-center align-items-center">
							<div class="d-flex justify-content-center align-items-center">
							<img src="{{asset('image/nha_logo_1.png')}}" alt="logo" style="width:50px;">
							<img class="desktop ml-1 mr-1" src="{{asset('image/nha_logo_2.png')}}" alt="logo" >
							</div>
							<h3 class="text-light font-weight-bold ">NHA E-PAYMENT</h3>
							<img class="desktop ml-1" src="{{asset('image/GA_logo.png')}}" alt="logo" >
						</div>
					</div>
					
					<div class="pad">
						
						
								<div class="row">
								
								
									<div class="col-lg-12">
										<br>
										<br>
									<center>
										<table border=0 width="90%" id="result">
										<tr valign="bottom" >
											<td align="center" colspan="3">
												<img src="{{asset('/image/dragonpay-logo-small.jpg')}}" alt="Dragonpay">
											</td>
										<tr>
									</tr>
										<tr>
											<td width="33%"><b>Transaction ID</b></td>
											<td>:</td>
											<td>{{@$txnid}}</td>
										<tr>
										
										<tr>
											<td><b>Payee</b></td>
											<td>:</td>
											<td>{{@$bene_name}}</td>
										</tr>

										<tr>
											<td><b>Amount</b></td>
											<td>:</td>
											<td>{{@$amount}}</td>
										</tr>
										
										<tr>
											<td width="25%"><b>Reference Number</b></td>
											<td>:</td>
											<td>{{@$refno}}</td>
										
										<tr>
											<td><b>Remarks</b></td>
											<td>:</td>
											<td>{{@$message}}</td>
										<tr>
										
										<tr>
											<td><b>Status</b></td>
											<td>:</td>
											<td>{{@$status}}</td>
										<tr>
										
										
										
										</table>
											
											
										<br>
										<br>
										<p>For inquiries or questions regarding the status of your payment, you may <a href="https://www.greenappletech.ph/" target="_blank">contact us here</a>.</p>	
											

									</center>
									
									
									</div>
								</div>	
								
								<div class="row">
								  <div class="col-lg-12" style="margin-top:30px !important;margin-bottom:25px !important">
										<center>
											<a href="{{url('information')}}" class="btn  btn-primary btn-lg" >Done</a>
										</center>	
									</div>
								</div>
				
						
					</div>
            </div>
				
			
        </div>




    </body>
</html>

<style>
table#result th, td {
  padding: 12px;
}
</style>