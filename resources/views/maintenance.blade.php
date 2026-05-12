<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NHA-Epayment — Maintenance</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/nha_logo_1.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <style>
        body {
            background: linear-gradient(0deg, rgba(70, 243, 8, 0.47), rgba(62, 100, 49, 0.47)),
                        url({{ asset('image/nha_background.jpg') }});
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.25);
            max-width: 520px;
            width: 100%;
            padding: 40px 35px;
        }
        .logo-row img {
            height: 55px;
            object-fit: contain;
        }
        .icon-wrap {
            font-size: 52px;
            color: #0b0389;
        }
        h4.title {
            font-weight: 700;
            font-size: 22px;
            color: #111;
        }
        p.msg {
            font-size: 15px;
            line-height: 1.8;
            color: #444;
        }
        #countdown {
            font-size: 13px;
            color: #888;
            margin-bottom: 8px;
        }
        .btn-ok {
            background: #0b0389;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            padding: 10px 50px;
            border-radius: 6px;
            border: none;
        }
        .btn-ok:hover {
            background: #0a0270;
            color: #fff;
        }
    </style>
</head>
<body>

    <div class="card text-center">

        <div class="logo-row d-flex justify-content-center align-items-center mb-4" style="gap:12px">
            <img src="{{ asset('image/nha_logo_1.png') }}" alt="NHA">
            <img src="{{ asset('image/nha_logo_2.png') }}" alt="NHA">
            <img src="{{ asset('image/GA_logo.png') }}" alt="GATSI">
        </div>

        <div class="icon-wrap mb-3">
            <i class="fa fa-wrench"></i>
        </div>

        <h4 class="title mb-3">We'll Be Right Back!</h4>

        <p class="msg">
            Our site is temporarily offline for scheduled maintenance and upgrades.
            We'll be back soon with an even better experience for you.
            <br><br>
            <strong>Thanks for your patience!</strong>
        </p>

        <div id="countdown" class="mt-3">Redirecting in <span id="timer">2:00</span></div>

        <button class="btn btn-ok mt-2" onclick="goHome()">OK</button>

    </div>

    <script>
        function goHome() {
            window.location.href = '{{ url("/") }}';
        }

        var total = 120;
        var interval = setInterval(function () {
            total--;
            var m = Math.floor(total / 60);
            var s = total % 60;
            document.getElementById('timer').textContent = m + ':' + (s < 10 ? '0' : '') + s;
            if (total <= 0) {
                clearInterval(interval);
                goHome();
            }
        }, 1000);
    </script>

</body>
</html>
