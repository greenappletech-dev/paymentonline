@extends('layouts.welmain')
@section('content')
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/nha_logo_1.png') }}">


<style scoped>

    .welcome-page {
        width: 100%;
    }

    .left-side-cover {
        float: left;
        position: relative;
        width: 50%;
        height: 100vh;
        background: linear-gradient(0deg, rgba(70, 243, 8, 0.47), rgba(62, 100, 49, 0.47)), url({{asset('/image/nha_background.jpg')}});
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;

    }

    .left-side-cover .center-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 50px;
        font-weight: 600;
    }

    .right-size-cover {
        position: relative;
        float: right;
        width: 50%;
        height: 100vh;
        background: #000;
    }

    .right-size-cover .center-logo {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .right-size-cover .center-logo img {
        display: block;
        width: 140px;
        height: 140px;
        margin-bottom: 20px;
    }

    .right-size-cover .center-logo button {
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
    @media screen and (max-width: 1168px) {
        .right-size-cover .center-logo img{
            width: 100px;
            height: 100px;
        }
        .left-side-cover .center-text {
            font-size: 20px;
            font-weight: 300;
        }
    }
    @media screen and(max-width: 685px) {
        .right-size-cover .center-logo img{
            width: 50px;
            height: 50px;
		}
		.right-size-cover .center-logo button {
			padding: 5px 25px;
		}
    }
	
	
	.text {
		position: relative;
		width: 80px;
		height: 25px;
		font-style: normal;
		font-weight: 600;
		font-size: 20px;
		line-height: 25px;
		text-align: center !important;
		color: #0E723E;
	}
</style>


<div class="welcome-page">

    <div class="left-side-cover">

        <div class="center-text">
            We offer the most <br>
            affordable services
        </div>

    </div>

    <div class="right-size-cover">

        <div class="center-logo">
            <div class="d-flex justify-content-between">
                <div class="row">
                    <div class="col-xl-4 col-sm-12">
                    <img src="{{ asset('image/nha_logo_1.png') }}" alt="">
                    </div>
                    <div class="col-xl-4 col-sm-12">
                    <img src="{{ asset('image/nha_logo_2.png') }}" alt="">
                    </div>
                    <div class="col-xl-4 col-sm-12">
                    <img src="{{ asset('image/GA_logo.png') }}" alt="">
                    </div>
                </div>
            </div>
			
			<div style="margin-top:250px">
            <button onclick="location.href='information'" class="welcome-button" style="width:100%">PAY NOW</button>
			<br>
			<br>
			<button onclick="location.href='portal'" class="welcome-button" style="width:100%">CHECK PAYMENTS</button>
			</div>
        </div>
    </div>
    
	
	
	
</div>



<footer class="main-footer main-footer2">
    <div class="container">
			<div class="col-lg-4 green_apple"><img src="{{ asset('images/green_apple.png') }}" alt=""></div>
			<div style="margin-bottom:25px">
			<span class="text">© 2022 Green Apple Technologies and Systems, Inc</span>
			</div>
			<div style="margin-bottom:20px">
				<span class="text">Unit 16A Petron Mega Plaza</span><br>
				<span class="text">358 Sen. Gil. J. Puyat Avenue</span><br>
				<span class="text">Bel-air, Makati City</span><br>
			</div>
			
			<div style="margin-bottom:20px">
				<span class="text">Customer hotline : +63 927 522 9568</span><br>
				<span class="text">Green Apple Tel. No: +63 8 681 9680</span><br>
				<span class="text">Inquire : inquiry@greenappletech.ph</span><br>
			</div>
			
    </div>
  </footer>

@endsection


