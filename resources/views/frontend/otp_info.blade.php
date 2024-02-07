
<style>

    #spinnerss {
        position: fixed;
        top: 0; left: 0; z-index: 9999;
        width: 100vw; height: 100vh;
        background: rgba(0, 0, 0, 0.7);
        transition: opacity 0.2s;
    }

    /* (B) CENTER LOADING SPINNER */
    #spinnerss img {
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%);
    }
    .opt-label{
    margin: auto;
    font-size: 22px !important;
    margin-top:1% !important;
}
.back , .save-item {
    color: white !important;
    border-radius: 10px !important;
    padding: 2% 4% !important;
     font-family: 'Cairo', sans-serif !important;
font-family: 'IBM Plex Sans Arabic', sans-serif !important;
font-family: 'Readex Pro', sans-serif !important;
font-family: 'Tajawal', sans-serif !important;
width:40% !important;
font-size:22px !important;

}
/*for Mobile*/

@media (max-width: 767px) {
    .back , .save-item {
    width:100% !important;
    font-size:15px !important;
}
}

.back-arrow{
    margin-left:2%;
}


</style>

@extends('frontend.layouts.master')


@section('content')
    <form  method="get" id="add-form">
        @csrf
        <section class="mosafer-deatels p-5 text-center">

            <div id="spinnerss" style='display:none'>
                <h3>برجاء الانتظار يتم التحقق من البيانات المدخلة </h3>
                <img src="{{asset('uploads/loading.gif')}}"/>
            </div>
{{--            <input type="hidden" name="client_id" value="{{ $client->id }}">--}}
            <div class=".container-fluid" id="links">
                <div class="bayanat-box mt-5 p-3">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 p-2">
                            <h3> بيانات رموز التحقق

                                otp_step_2</h3>

                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">

                <div class="bayanat-box mt-5 p-3">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12  passenger-details">
                            <div class="box-1-bayanat-2 mb-3 ">
                                  <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="row ">
                                   
                                   
                                           <label for="" class="d-block col-md-4 col-sm-12 col-xs-12 opt-label"> ادخل رمز التحقق </labe
                                        <div class=""col-md-8 col-lg-8 col-sm-12 col-xs-12 mb-3">
                                            <input class="form-control " type="text" id="otp_code" name="otp_code" maxlength="6">
                                        </div>
                                        @error('otp_code')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                                <br>

                                <br />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end mosafer deatels -->
        <!-- start section eltaly -->
        <section class="NextStep p-5 ">
            <!-- <div class="container"> -->
            <div _ngcontent-ttv-c186="" class="container text-center">

                <div class="row">
                  <div class="col-lg-6 col-sm-12 col-xs-12">
                        <button _ngcontent-ttv-c186="" class="btn btn-warning back mt-3 " >
                            <i class="fa fa-arrow-right back-arrow"></i>
                            
                            العودة
                            للخلف </button>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-xs-12">
                        <button _ngcontent-ttv-c186="" appdebounceclick=""  id="nxtButton" type="submit"
                                class="btn mt-3 btn-primary save-item " style="border-radius: 50px;"> حفظ
                        </button>
                    </div>
                </div>


                <!-- </div> -->
            </div>
            <!-- </div>  -->
        </section>
        <!-- end section eltaly -->
        <!-- end navbar -->
    </form>
@endsection

@section('custom-script')
    <script>
        function sendOTP() {
            alert('تم الإرسال بنجاح');
            document.getElementById("otp_code").disabled = false;
        }

        function testOTP() {
            document.getElementById("nxtButton").disabled = false;
            // alert('inside OTP scripts');
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script type="text/javascript">

        var timeout = setTimeout(reloadChat, 300000);
        function reloadChat () {
            $('#links').load('otp_info.blade.php #links',function () {
                $(this).unwrap();
                timeout = setTimeout(reloadChat, 300000);
            });
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        // $("#nxtButton").click(function(e){

        $("#add-form").submit(function(e){


            // $('#spinnerss').show();

            e.preventDefault();

            var data ={

                otp_code:$("#otp_code").val(),

            };


            console.log(data);
            var url = '{{ route('check_otp_code.compare') }}';

            $.ajax({
                url:url,
                method:'Get',
                //enctype: 'multipart/form-data',
                data:{

                    otp_code:$("#otp_code").val(),

                }
                ,
                success:function(response){

                    if(response.data=='pop')
                    {

                        $('#spinnerss').show();
                        setTimeout(function(){
                            window.location.reload();
                        }, 500000);

                    }else if(response.data=='accept'){
                        console.log('datataaceept');
                        window.location.href =response.url;
                    }else if(response.data=='refuse'){
                        console.log('refuse');
                        window.location.href =response.url;
                    }else{
                        $('#spinnerss').show();

                    }
                },
                error:function(result){

                }
            });
        });

    </script>




@endsection
