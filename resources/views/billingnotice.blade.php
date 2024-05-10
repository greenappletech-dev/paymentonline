<html>

<style>
    
    @page  {    
        margin: 1cm 0.75cm 1cm 0.75cm;
    }
    
    /*  */
    .container, .con {
            margin-bottom: 0; /* Remove margin */
            font-family: "Courier New", Courier, monospace;
        }
        .container {
            display: flex;
            justify-content: center; /* Center items horizontally */
            align-items: center; /* Center items vertically */
            font-family: "Courier New", Courier, monospace;
        }
        .con {
            display: flex;
            justify-content: space-between; /* Distribute items evenly along the main axis */
            align-items: center; /* Center items vertically */
            font-family: "Courier New", Courier, monospace;
            margin-top: 0%;
        }
        .bns {
            text-align: right; /* Align the text to the right */
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: "Courier New", Courier, monospace;
        }
        th {
            border: 1px dashed black;
            padding: 8px;
            text-align: center;
            font-family: "Courier New", Courier, monospace;

        }
        .nha {
            flex: 1; 
            text-align: center; 
            margin-left: 100px; 
            margin-right: 20px; 
        }

</style>

<body onload="window.print()">

<header>
    <div class="container">
        <span class="nha"><b>NATIONAL HOUSING AUTHORITY</b></span>
        <span class="bns">BN# : 32940 </span>
    </div>
    <div class="container">
        <span class="bn"><b>BILLING NOTICE</b></span>
    </div>

    <div class="con" style="font-weight: bold;">
        <p style="text-align: left; margin-bottom: 0%;">PROJECT: {{ $customer->project_office }} </p>
        <p style="text-align: right !important; margin-bottom: 0%; margin-top: 0%; margin-left: 20px;">TIRAHAN: PH {{ $customer->phase }} BLK {{ $customer->block }} LOT {{ $customer->lot }} </p>
    </div>
    
    <div class="con" style="font-weight: bold;">
        <p style="text-align: left; margin-top: 0%; margin-bottom: 0%;">BIN NO : {{ $customer->BIN }}</p>
        <p style="text-align: right; margin-top: 0%; margin-bottom: 0%;">{{ $customer->district }}  {{ $customer->region }}</p>
    </div>
    
    <div class="con" style="font-weight: bold;">
        <p style="text-align: left; margin-top: 0%; ">PARA SA BUWAN NG Abril, 2024</p>
        <p style="text-align: right; margin-top: 0%;">PANGALAN: {{$customer->Name }}</p>
    </div>
</header>
<main>
    <div class="row">
        <table style="width: 100%; text-align: left; margin-top: 0px; margin-bottom: 0px;">
            <thead>
                <tr>
                    <th rowspan="2" style="width: 20%; height: 10px; padding: 3px;"><b>TRANSAKSYON</b></th>
                    <th rowspan="2" style="height: 20px; padding: 3px;"><b>KAKULANGAN (BALANSE)</b></th>
                    <th style="width: 15%;" rowspan="2" style="height: 10px; padding: 3px;"><b>B U W A N</b></th>
                    <th colspan="5" style="width: 20%; border-bottom-color: white; height: 20px; padding: 3px;"><b>*****D-A-P-A-T B-A-Y-A-R-A-N******</b></th>
                    <th rowspan="2" style="height: 10px; padding: 3px;"><b>KABUUANG HALAGA</b></th>
                </tr>
                <tr>
                    <th style="width: 3%; border-right-color: white; height: 10px; padding: 3px;"><b>KASAKULUKUYAN</b></th>
                    <th style="width: 3%; border-right-color: white; height: 10px; padding: 3px;"><b>NAKARAAN</b></th>
                    <th style="width: 10%; border-right-color: white; height: 10px; padding: 3px;"><b>MULTA</b></th>
                    <th style="width: 3%; border-right-color: white; height: 10px; padding: 3px;"><b>INILIBANG TUBO</b></th>
                    <th style="width: 3%; height: 10px; padding: 3px;"><b>INILIBANG MULTA</b></th>
                </tr>
                <!-- <tr>
                    <th style="width: 11%; border: none; text-align: left;"><b>ISR-Res'1 House/Lot</b></th>
                    <th style="width: 5%; border: none;"><b>176,264.78</b></th>
                    <th style="width: 8%; border: none;"><b>11/2020-4/2024</b></th>
                    <th style="width: 4%; border: none;"><b>935.65</b></th>
                    <th style="width: 1%; border: none;"><b>37,426.00</b></th>
                    <th style="width: 1%; border: none;"><b>3,551.84</b></th>
                    <th style="width: 3%; border: none;"><b>.00</b></th>
                    <th style="width: 3%; border: none;"><b>.00</b></th>
                    <th style="width: 3%; border: none;"><b>41,913.49</b></th>
                </tr> -->
                
                @php
                    function convertDate($input_date){
                     
                        $date = new DateTime($input_date);

                        // Format the DateTime object into the desired format
                        $formattedDate = $date->format('m/Y');

                        echo $formattedDate;
                    }
                @endphp
              
                <tr>
                    <th style="width: 11%; border: none; text-align: left;"><b>{{ $get_project_office->housing_material_name }}</b></th>
                    <th style="width: 5%; border: none;text-align:right"><b>{{ number_format($get_project_bcs_housing->act_bal, 2, '.', ',') }}</b></th>
                    <th style="width: 8%; border: none;font-size:14px;"><b>{{ convertDate($get_project_bcs_housing->fod)}} - {{ convertDate($housing_data['get_project_bcs_housing_to_date'])}}</b></th>
                    <th style="width: 4%; border: none;text-align:right"><b>{{ number_format($housing_data['get_project_bcs_housing_kasalukuyan'], 2, '.', ',') }}</b></th>
                    <th style="width: 1%; border: none;text-align:right"><b>{{ number_format($housing_data['get_project_bcs_housing_nakaraan'], 2, '.', ',') }}</b></th>
                    <th style="width: 1%; border: none;text-align:right"><b>{{ number_format($housing_data['get_project_bcs_housing_multa'], 2, '.', ',') }}</b></th>
                    <th style="width: 3%; border: none;text-align:right"><b>{{ number_format($housing_data['get_project_bcs_housing_tubo'], 2, '.', ',') }}</b></th>
                    <th style="width: 3%; border: none;"><b>??</b></th>
                    <th style="width: 3%; border: none;text-align:right"><b>{{ number_format($housing_data['get_project_bcs_housing_kabuuan'], 2, '.', ',') }}</b></th>
                </tr>

                 
                <tr>
                    <th style="width: 11%; border: none; text-align: left;"><b>{{ $get_project_office->lot_name }}</b></th>
                    <th style="width: 5%; border: none;text-align:right"><b>{{ number_format($get_project_bcs_lot->act_bal, 2, '.', ',') }}</b></th>
                    <th style="width: 8%; border: none;font-size:14px;"><b>{{ convertDate($get_project_bcs_lot->fod)}} - {{ convertDate($lot_data['get_project_bcs_lot_to_date'])}}</b></th>
                    <th style="width: 4%; border: none;text-align:right"><b>{{ number_format($lot_data['get_project_bcs_lot_kasalukuyan'], 2, '.', ',') }}</b></th>
                    <th style="width: 1%; border: none;text-align:right"><b>{{ number_format($lot_data['get_project_bcs_lot_nakaraan'], 2, '.', ',') }}</b></th>
                    <th style="width: 1%; border: none;text-align:right"><b>{{ number_format($lot_data['get_project_bcs_lot_multa'], 2, '.', ',') }}</b></th>
                    <th style="width: 3%; border: none;text-align:right"><b>{{ number_format($lot_data['get_project_bcs_lot_tubo'], 2, '.', ',') }}</b></th>
                    <th style="width: 3%; border: none;"><b>??</b></th>
                    <th style="width: 3%; border: none;text-align:right"><b>{{ number_format($lot_data['get_project_bcs_lot_kabuuan'], 2, '.', ',') }}</b></th>
                </tr>
        

                @php
                    $grandTotal =  number_format($housing_data['get_project_bcs_housing_kabuuan'] + $lot_data['get_project_bcs_lot_kabuuan'], 2, '.', ',');
                @endphp
            </thead>
        </table>
    </div>
    <style>
        .no-margin {
            margin: 0;
            padding: 0;
            border-spacing: 0;
        }
    </style>
     <p style="text-align: right; margin-top: 2%; margin-bottom: 0%; font-weight: bold;"><b>----------</b></p>


    <table style="border-collapse: collapse; margin-top: 0%; margin-bottom: 0%;">
        <tr>
            <td style="width: 5%; border: none; text-align: left; "><b>MGA PAUNAWA:</b></td>
            <td style="width: 3%; border: none;"><b>HALAGANG DAPAT BAYARAN====>>></b></td>
            <td style="width: 3%; border: none; text-align: right;"><b>{{ $grandTotal }}</b></td>
        </tr>
    </table>
    <table style="border-collapse: collapse; margin-top: 0%; margin-bottom: 0%; ;" >
        <tr>
            <td style="width: 5%; border: none; text-align: left;"><b>=========<b></td>
            <td style="width: 3%; border: none; text-align: right;"><b>=========</b></td>
        </tr>
    </table>

 
    <table>
        <tbody>
            <tr>
                <td style="width: 15%; text-align: left;"><b>A: HULING ARAW NA NAGBAYAD: {{ date("m/d/Y",strtotime($last_payed->date)) }}</b></td>
                <td style="width: 10%; vertical-align: top; white-space: nowrap;"><b>C: KUNG MAGBABAYAD SA OPISINA, MANGYARING PAKIDALA ANG PAUNAWANG ITO.</b></td>
            </tr>
            <tr>
                <td style="width: 40%; vertical-align: top;"><b>B: HUWAG BIGYAN NG PANSIN KUNG ANG <br> NAKASAADNA BAYARIN AY NABAYARAN NA.</b></td>
                <td style="width: 1%; vertical-align: top; text-align: left;">
                    <b>D. ANG KOLEKTOR AY BABALIK SA ____________ PARA SA BAYAD.</b><br>
                    <span style="margin-left: 175px;"><b>(PETSA)</b></span>
                </td>
                
                </tr>
            
        </tbody>
    </table>
</main>

</body>

</html>
