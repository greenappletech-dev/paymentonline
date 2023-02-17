<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="_token" content="{{ csrf_token() }}"/>
  <input type="hidden" name="token" id="token" value="{{ csrf_token() }}"> 
  <title>NHA Loans Administration</title>
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


	
	<!-- date-range-picker -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>


	<!-- load jQuery and jQuery UI -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>


	<!-- Bootstrap 3.3.6 -->
	<script src="{{ asset('adminlte/bootstrap/js/bootstrap.min.js')}}"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('adminlte/dist/js/app.min.js')}}"></script>


 
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
<style>

html, body {
     height: 0%; 
	
}



body {
    background-image: url("{{ asset('images/bahay.png') }}") !important;
	 /* Image is centered vertically and horizontally at all times */
	  background-position: center center;
	  
	  /* Image doesn't repeat */
	  background-repeat: no-repeat !important;
	  
	  /* Makes the image fixed in the viewport so that it doesn't move when 
		 the content height is greater than the image height */
	  background-attachment: fixed;
	  
	  /* This is what makes the background image rescale based on its container's size */
	  background-size: cover;
	  
	  /* Pick a solid background color that will be displayed while the background image is loading */
	  background-color:#464646;
	  
	
}




@media only screen and (max-width: 1680px) {
	body {
			/* The file size of this background image is 93% smaller
			 * to improve page load speed on mobile internet connections */
		   background-image: url("{{ asset('images/1680x1050.png') }}") !important;
		   /* Image is centered vertically and horizontally at all times */
			  background-position: center center;
			  
			  /* Image doesn't repeat */
			  background-repeat: no-repeat !important;
			  
			  /* Makes the image fixed in the viewport so that it doesn't move when 
				 the content height is greater than the image height */
			  background-attachment: fixed;
			  
			  /* This is what makes the background image rescale based on its container's size */
			  background-size: cover;
			  
			  /* Pick a solid background color that will be displayed while the background image is loading */
			  background-color:#464646;
			  
			
		  }
		  
		 .login-box, .register-box {
				width: 360px !important;
				margin: 4% auto !important;
				
			} 
		  
	}

@media only screen and (max-width: 1039px) {
	body {
			/* The file size of this background image is 93% smaller
			 * to improve page load speed on mobile internet connections */
		   background-image: url("{{ asset('images/1039x708.png') }}") !important;
		   /* Image is centered vertically and horizontally at all times */
			  background-position: center center;
			  
			  /* Image doesn't repeat */
			  background-repeat: no-repeat !important;
			  
			  /* Makes the image fixed in the viewport so that it doesn't move when 
				 the content height is greater than the image height */
			  background-attachment: fixed;
			  
			  /* This is what makes the background image rescale based on its container's size */
			  background-size: cover;
			  
			  /* Pick a solid background color that will be displayed while the background image is loading */
			  background-color:#464646;
			  
			
		  }
		  
		 .login-box, .register-box {
				width: 360px !important;
				margin: 1% auto !important;
				
			} 
		  
	}




/* For mobile devices */
@media only screen and (max-width: 767px) {
	body {
			/* The file size of this background image is 93% smaller
			 * to improve page load speed on mobile internet connections */
		   background-image: url("{{ asset('images/550x900.jpg') }}") !important;
		   /* Image is centered vertically and horizontally at all times */
			  background-position: center center;
			  
			  /* Image doesn't repeat */
			  background-repeat: no-repeat !important;
			  
			  /* Makes the image fixed in the viewport so that it doesn't move when 
				 the content height is greater than the image height */
			  background-attachment: fixed;
			  
			  /* This is what makes the background image rescale based on its container's size */
			  background-size: cover;
			  
			  /* Pick a solid background color that will be displayed while the background image is loading */
			  background-color:#464646;
			  
			
		  }
	}
	
	
	
/* For mobile devices */
@media only screen and (max-width: 550px) {
	body {
			/* The file size of this background image is 93% smaller
			 * to improve page load speed on mobile internet connections */
		   background-image: url("{{ asset('images/550x900.jpg') }}") !important;
		   /* Image is centered vertically and horizontally at all times */
			  background-position: center center;
			  
			  /* Image doesn't repeat */
			  background-repeat: no-repeat !important;
			  
			  /* Makes the image fixed in the viewport so that it doesn't move when 
				 the content height is greater than the image height */
			  background-attachment: fixed;
			  
			  /* This is what makes the background image rescale based on its container's size */
			  background-size: cover;
			  
			  /* Pick a solid background color that will be displayed while the background image is loading */
			  background-color:#464646;
			  
			
		  }
	}
	
	
	


.login-box, .register-box {
    width: 360px !important;
    margin: 7% auto;
	
}

#msform fieldset, .login-box-body {
    border-radius: 10px !important;
}

#msform fieldset,{
    box-shadow: 0px 20px 20px 0px rgba(0, 0, 0, 0.4) !important;
}
.login-box-body{
    background: #fff;
    padding: 20px;
    border-top: 0;
    color: #666;
	box-shadow: -3px 5px 12px 4px rgb(0 0 0 / 10%) !important;

}

.form-control {
    border-radius: 5px !important;

}
	.login-box-msg {
		padding: 0 20px 20px 20px;
		text-align:center;
		font-weight: 500;
		font-size:22px;
		color: #000;
	}

	.login-page {
		/*background: #ffffff !important;*/
		
	 
	}

	.login-nav-logo {
		margin: auto;
		display: grid;
		margin-top: 10px;
		margin-bottom :20px;
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
		padding-left:30px;
    }
     
    .GFG2 {
        background-color: transparent;
    }
     
    .GFG3 {
        background-color: transparent;
		padding-right:30px;
    }
</style>

</head>
<body class="hold-transition login-page">

	<!--
	<div style="position:abosolute;margin-top:50px">
		<div class="row">
				<div style="width: 16.66666667%;">
				<div class="box">
					<div class="box-body">
							<div id="Geeks">
								<div class="GFG1"> <img src="{{ asset('images/logo1.png') }}" style="width:75%" /></div>
								<div class="GFG2"> <img src="{{ asset('images/logo2.png') }}" style="width:90%" /></div>
								<div class="GFG3"> <img src="{{ asset('images/logo3.png') }}" style="width:100%" /></div>
							</div>
						
					</div>
				</div>
				</div>
		</div>
	</div>
	-->	
		
	


<div id="fullPage">


	
<div class="login-box">


 <div class="login-nav-logo">
	 <div id="Geeks">
        <div class="GFG1"> <img src="{{ asset('images/Logo1.png') }}" style="width:75%" /></div>
        <div class="GFG2"> <img src="{{ asset('images/Logo2.png') }}" style="width:90%" /></div>
        <div class="GFG3"> <img src="{{ asset('images/Logo3.png') }}" style="width:100%" /></div>
    </div>
 </div>

  
  <div class="login-box-body">
  

  
  
    <div class="login-box-msg">
			<span>NHA Loans Administration</span><br>
			<span>Beneficiaries Portal</span><br>
			<span>(BETA)</span><br>
	</div>
	
   
   
    <form method="POST" action="{{ url('searchByDetails') }}" id="FormLogin" >
     @csrf 
		 <div class="row">
			<div class="col-lg-12">
				<div class="form-group">
				  <label for="exampleInputEmail1">District</label>
					  <select  class="form-control" id="district" name="district" required>
						<option value="">-- Select District --</option>
						 @foreach($districts as $district)
							<option value="{{$district->id}}">{{$district->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
				  <label for="exampleInputEmail1">Project Name</label>
				  <select class="form-control" id="project_office" name="project_office" required style="width:100%" >
						<option value="">-- Select Project Name --</option>
					</select>
				</div>
				<div class="form-group">
				  <label for="exampleInputEmail1">BIN</label>
				  <input type="text" class="form-control" id="beneficiaries_id" name="beneficiaries_id" required>
				</div>
				<div class="form-group">
				  <label for="exampleInputEmail1">Last Name</label>
				  <input type="text" class="form-control" id="last_name" name="last_name" >
				</div>
			</div>
		</div>
		<div style="clear:both;margin-bottom:15px"></div>
		<div class="form-group has-feedback">      
			  <button class="btn btn-primary btn-lg btn-block mb-2 mb-lg-5" type="submit">View Payment History</button>
		</div>
    </form>


 

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->



</div>





<script>
$('#district').change(function() {
	var value =  $(this).val(); 	

	
	if( value == ""){
		
		$('select[id="project_office"]').attr('disabled', 'disabled');
		$('select[id="project_office"]').val('');
		
	}
	else
	{
		
		$('select[id="project_office"]').removeAttr("disabled");
		
		$.ajax({
			url: "{{ url('getprojectofficeRelated') }}",
			data : {'district':value},
			headers:{'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')},
			type : 'POST',
			datatype : 'JSON',
			success:function(resx){				
				
				let selectValue2 = '<option value="" >-- Select Project Name --</option>';
				
			
	
							
				$.each(resx.data, function(index, value) {

					selectValue2 += "<option value=\""+value.id+"\">"+value.name+"</option>";
						
				});
				
				
	

				$('select[id="project_office"]').empty().append(selectValue2);
							
			}	
		});
		
	}
	
	
});
</script>


</body>
</html>