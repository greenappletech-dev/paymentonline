<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
	<meta name="_token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>NHA Loans Adminstration</title>
	

	
	 <!-- Bootstrap 3.3.6 -->
	  <link rel="stylesheet" href="{{asset('adminlte/bootstrap/css/bootstrap.min.css')}}">
	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	  <!-- Ionicons -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	  <!-- Theme style -->
	  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.css')}}">
	  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
	  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/skins/_all-skins.css')}}" >

	  <!-- DataTables -->
	  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.css')}}">

	  <!-- load jQuery and jQuery UI -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	
	
   <!-- Bootstrap 3.3.6 -->
   <script src="{{ asset('adminlte/bootstrap/js/bootstrap.min.js')}}"></script>
   <!-- AdminLTE App -->
   <script src="{{ asset('adminlte/dist/js/app.min.js')}}"></script>

	<!-- date-range-picker -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>

	<!-- Bootstrap 3.3.6 -->
	<script src="{{ asset('adminlte/bootstrap/js/bootstrap.min.js')}}"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('adminlte/dist/js/app.min.js')}}"></script>


	<!-- DataTables -->
	<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}" ></script>
	<script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.min.js')}}" ></script>

	

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
  <style>
	.main-header {
		position: relative;
		max-height: 100px;
		z-index: 1030;
		box-shadow: 0.5px 0.5px 0.5px rgba(0, 0, 0, 0.25);
	}
	.skin-blue .main-header .navbar {
		background-color: #FFFFFF !important;
	}
	.main-footer {
		background: #0E723E !important;
		padding: 15px;
		color: #fff;
		border-top: 1px solid #d2d6de;
	}
	#copyright{
		
		width: 249px;
		height: 17px;

		font-family: Helvetica;
		font-style: normal;
		font-weight: 400;
		font-size: 15px;
		line-height: 17px;

		color: #FFFFFF;
	}
	
	@media (min-width: 1200px){
		.container {
			width: 1600px;
		}
	}
	
	
	
	#Geeks {
        width: 100%;
		display: flex;
		align-content: space-between;
		flex-direction: row;
		flex-wrap: nowrap;
		justify-content: flex-start;
		align-items: baseline;
	}
	
	
    #Geeks div {
        flex: 1;
    }
     
    .GFG1 {
        background-color: transparent;
    }
     
    .GFG2 {
        background-color: transparent;
    }
     
    .GFG3 {
        background-color: transparent;
    }
	
	
	.main-footer2 {
		background: #fff !important;
		padding: 15px;
		color: #fff;
		border-top: 1px solid #d2d6de;
		min-height: 240px;
		z-index: 820;
	}
	
	
	 
	.green_apple {
        margin-top:90px;
    }
	
	
	.contact{
		
		position: relative;
		width: 80px;
		height: 25px;
		font-style: normal;
		font-weight: 700;
		font-size: 22px;
		line-height: 25px;
		/* identical to box height */
		text-align: center !important;
		color: #0E723E;
	}
	
	.borderline{
		
		position: relative;
		width: 100%;
		height: 0px;
		border: 1px solid #0E723E;
		margin-bottom:10px;
		margin-top:10px;
	}
	
	.tag2{
		
		position: relative;
		width: 372px;
		height: 25px;
		font-style: normal;
		font-weight: 400;
		font-size: 20px;
		line-height: 25px;
		/* identical to box height */
		color: #2D2D2D;
		text-align: center !important;
	}
	
	
	
		
	#Geeks2 {
        width: 100%;
		display: flex;
		align-content: space-between;
		flex-direction: row;
		flex-wrap: nowrap;
		justify-content: flex-start;
		align-items: baseline;
	}
	
	#Geeks2 div {
        flex: 1;
    }
    
	

	
	.address {
		color: #2D2D2D;
		display: block;
		font-size: 16px;
		line-height: 1.4em;
		margin: -1.55em 0 0 25px;
		padding: 4px 0 5px;
	}
	
	
	
	.emaillink{
		position: relative;
		width: 173px;
		height: 20px;
		font-style: normal;
		font-weight: 400;
		font-size: 16px;
		line-height: 20px;
		color: #2D2D2D;
	}
	
	.contact_number{
		position: relative;
		width: 116px;
		height: 20px;
		font-style: normal;
		font-weight: 400;
		font-size: 16px;
		line-height: 20px;
		color: #2D2D2D;

	}
	.websitelink{
		position: relative;
		font-style: normal;
		font-weight: 400;
		font-size: 17px;
		line-height: 20px;
		color: #2D2D2D;
		margin: auto;
	  padding: 10px;
	}
	.socialflatform{
		  margin-top:120px;
	}
	
	
	#wrapperText {
		  display: flex;
		  align-items: center;
	}
	
	.totalamountText{
		
		font-size:16px;
		font-weight:600;
	}
	
	.totalamountValue{
		
		font-size:16px;
		font-weight:600;
	}
	
  </style>
  
  
</head>



<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <div class="col-lg-2">
				 <div id="Geeks">
					<div class="GFG1"> <img src="{{ asset('images/Logo1.png') }}" style="width:60%" /></div>
					<div class="GFG2"> <img src="{{ asset('images/Logo2.png') }}" style="width:80%" /></div>
					<div class="GFG3"> <img src="{{ asset('images/Logo3.png') }}" style="width:100%" /></div>
				</div>
		  </div>
		  <div class="col-lg-10">
				<div style="float:right;margin-top:8px"><a href="{{ url('') }}" type="button" class="btn btn-orange  btn-flat  btn-lg">
								 <i class="fa fa-fw fa-mail-reply"></i>[RETURN TO HOME PAGE]
							</a></div>
		  </div>
        </div>

 	
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header"></section>

      <!-- Main content -->
      <section class="content">
        
		<div style="clear:both;margin-bottom:80px"></div>
		<div class="row">			
			<div class="box">
				<!-- /.box-header -->
				<div class="box-body">
					
					
					 <div class="col-lg-6">
						<p><b>BIN :</b> {{ @$customer->BIN}}</p>
						<p><b>Name :</b> {{@$customer->Name}} </p>
						<p><b>Region :</b> {{@$customer->region}}</p>
						<p><b>District :</b> {{@$customer->district}}</p>
					</div>
					 <div class="col-lg-6">
					<p><b>Project :</b> {{@$customer->project_office}}</p>
					<p><b>Address :</b> Phase&nbsp;{{@$customer->phase}}&nbsp;&nbsp;&nbsp;Block&nbsp;{{@$customer->block}}&nbsp;&nbsp;&nbsp;Lot&nbsp;{{@$customer->lot}}  </p>
					</div>
					
				</div>
				<!-- /.box-body -->
			</div>		
		</div>
		
		
		<div class="row">			
			<div class="box">
				<!-- /.box-header -->
				<div class="box-body">
					<div style="clear:both;margin-bottom:10px"></div>
					<table id="mainDatatables"  class="table  table-hover"  width="100%" >
						<thead>
						<tr style="color:#0E723E">
								
							  <th>Date of Payment</th>
							  <th>Time of Payment</th>
							   <th>OR Number</th>
							  <th>Payment Amount</th>
							  <th>Transaction Number</th>
							   <th>MOP</th>
							   <th>Ref #</th>
							   <th>Status</th>
							   <th>Remarks</th>
							  <th>Collector Name</th>


						</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			
	
				<div id="wrapperText" style="padding:10px">
					<div class="GFG1" style="background-color:transparent;width:25%"><span class="totalamountText">Total Amount</span></div>
					<div class="GFG2" style="background-color:transparent;width:75%"><span class="totalamountValue">0.00</span></div>
				</div>
		
			
		
			
		</div>
		  

        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
	
		  

	
  </div>
  <!-- /.content-wrapper -->
  <div  style="background-color:#ecf0f5;color:#000;padding-bottom:5px;padding-left:3px;font-size:11px">
	*Disclaimer: Payments shown on this page only pertains to collections made by Green Apple Technology & Systems, Inc.For payment concerns, you may reach out to any of our communications channels below.
  </div>


  <footer class="main-footer main-footer2">
    <div class="container">
		 <div class="row">
			<div class="col-lg-4 green_apple"><img src="{{ asset('images/green_apple.png') }}"  /></div>
			
			<div class="col-lg-4">
				<div style="clear:both;margin-bottom:15px"></div>
				<span class="contact"><center>Contacts</center></span>
				<div class="borderline"></div>
				<span class="tag2"><center>We are always available to meet your needs.</center></span>
				<div style="clear:both;margin-bottom:15px"></div>
				
				
				<div style="clear:both;margin-bottom:10px">
					<img src="{{ asset('images/pin.png') }}" />
					  <span class="address">
						1044 EDSA Magallanes, Makati City
					 </span>
				  </span>
				</div>
				<div style="clear:both;margin-bottom:15px">
					<span class="contact_number"><img src="{{ asset('images/phone.png') }}" />+63 9176241139</span>&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#7062c8">Via Viber <img src="{{ asset('images/viber.png') }}" width="4%" /></span>
				</div>
				<div style="clear:both;margin-top:10px">
					<span class="emaillink"><i class="fa fa-fw fa-envelope" style="color: #0E723E;"></i>inquiry@greenappletech.ph</span>
				</div>
				
			
			</div>
			<div class="col-lg-4">
				<div class="socialflatform">	
					<center>
						<div>
							<img src="{{ asset('images/facebook.png') }}"  />
						</div>
						<div style="clear:both;margin-bottom:10px"></div>
						<span class="websitelink">
							https://www.facebook.com/nhagreenapple 
						</span>
					</center>
				</div>
			</div>
		</div>
    </div>
  </footer>
  
  
  <footer class="main-footer">
    <div class="container">
      <center><strong id='copyright'>Copyright &copy; 2018. All rights reserved.</span></center>
    </div>
    <!-- /.container -->
  </footer>
  
  
</div>
<!-- ./wrapper -->





<script type="text/javascript">
var table;

$(document).ready(function(){
	loadMainAccount();
});

function loadMainAccount()
{
	table =  $('#mainDatatables').DataTable({ 
	"order":[],
	
	
	"processing": true, //Feature control the processing indicator.
	"ajax": {
		"url": "{{asset('getData')}}",
		"data" : {	
					_token: "{{csrf_token()}}",
					"district":"<?php echo $data['district']; ?>",
					"project_office":"<?php echo $data['project_office']; ?>",
					"beneficiaries_id":"<?php echo $data['beneficiaries_id']; ?>",
					"last_name":"<?php echo $data['last_name']; ?>"
				},
		"type": "post",
		"dataSrc" : function ( json ) {
				
				console.log(json.totalamount);
				
				$(".totalamountValue").empty().html(json.totalamount);
				
				return json.data;
				
				
				
			},
		
		
	},
	
	
	
	  "scrollX":  true,
	  "scrollCollapse": true,
	  "bDestroy": true,
	  "aLengthMenu": [[5,10, 15, 25, 50, 75, -1], [5,10, 15, 25, 50, 75, "All"]],
      "iDisplayLength": 25,
		"columns"    : [
		{'data': 'DayofPayment'},
		{'data': 'TimeofPayment'},
		{'data': 'ORNumber'},
		{'data': 'PaymentAmount'},
		{'data': 'Transaction_number'},
		{'data': 'Mop'},
		{'data': 'Reference_number'},
		{'data': 'Satus'},
		{'data': 'Remarks'},
		{'data': 'CollectorName'},
		
	],
	
	

});
	
}
</script>

<script type="text/javascript">
function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}
</script>



</body>
</html>
