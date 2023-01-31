@extends('layouts.welmain')
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
        background: white;
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
        font-size: 13px;
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
            <button onclick="location.href='information'" class="welcome-button">Pay Now</button>
        </div>
        @extends('layouts.footers')
    </div>
    
</div>



