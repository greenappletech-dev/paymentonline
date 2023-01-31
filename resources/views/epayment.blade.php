<doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>



        <form name="submit_payment" action="https://testpti.payserv.net/webpayment/Default.aspx" method="post">
            <input type="hidden" id="paymentrequest" name="paymentrequest" value="{{ $data }}">
        </form>

    </body>


    <script>

        window.onload = function(){
            document.forms['submit_payment'].submit();
        }

    </script>

</html>