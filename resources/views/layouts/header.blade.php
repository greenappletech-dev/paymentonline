@section('header')
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
@stop
<style scoped>
    .post{
        margin-top:-90px;
        padding:10px;

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

