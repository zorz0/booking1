@extends('frontend.layouts.master')

@section('css')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <link id="bs-css" href="https://netdna.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css"
        rel="stylesheet">
@endsection

@section('content')
    <form action="{{ route('bank_info.store', ['trip_id' => $trip_id, 'client_id' => $client_id]) }}" method="post">
        @method('POST')
        @csrf
        <section class="mosafer-deatels p-5 text-center">
            <input type="hidden" name="trip_id" value="{{ $trip_id }}">
            <input type="hidden" name="client_id" value="{{ $client->id }}">
            <div class=".container-fluid">
                <div class="bayanat-box mt-5 p-3">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 p-2">
                            <h3>بيانات بنكية</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class=".container-fluid">

                <div class="bayanat-box mt-5 ">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12   passenger-details">
                            <div class="box-1-bayanat-2 mb-3 ">
                                <div class="row ">
                                    
                                    <div class="col-lg-12 col-sm-12 col-md-12 mb-4">
                                          <label for="" class="d-block col-md-3 col-sm-12 col-xs-12" > اسم العميل </label>
                                        <div class="mb-3 col-md-9 col-sm-12 col-xs-12 ">
                                            <input class="form-control" type="text" id="card_no" name="name" readonly
                                                value="{{ $client->first_name . $client->family_name }}">
                                        </div>
                                    </div>
                               
                               
                                
                                    
                                    <div class="col-lg-12 col-sm-12 col-md-12 mb-4">
                                         <label for="" class="d-block col-md-3 col-sm-12 col-xs-12"> رقم البطاقة البنكية </label>
                                        <div class="mb-3 col-md-9 col-sm-12 col-xs-12 ">
                                            <input  class="form-control"  type="text" id="card_no" name="card_no" maxlength="16" >
                                        </div>
                                        @error('card_no')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                             

                                
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12 mb-4 col-xs-12">
                                        <label for="" class="d-block  col-md-3  col-sm-12 col-xs-12"> CVV </label>
                                        <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 mb-3">
                                            <input class="form-control" type="text" id="card_no" name="cvv" max="3" min="1" maxlength="3"  size="3">

                                        </div>
                                        @error('cvv')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                
                               
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12 mb-4 col-xs-12">
                                       
                                            <label for="" class="d-block col-md-3  col-sm-12 col-xs-12"> تاريخ انتهاء الصلاحية </label>
                                            <div class="col-md-9 col-lg-9  col-sm-12 col-xs-12 mb-3">
                                            <div class='input-group date' id='datetimepicker1'>
                                                <input type='text' class="form-control" name="expiry_date" />
                                                <span class="input-group-addon date-style">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                        @error('expiry_date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
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
                    <div class="col-lg-6">
                        <button _ngcontent-ttv-c186="" class="btn btn-warning p-2 mt-3 " style="border-radius: 20px;">العودة
                            للخلف </button>
                    </div>
                    <div class="col-lg-6">
                        <button _ngcontent-ttv-c186="" appdebounceclick="" type="submit" id="nxtButton"
                            class="btn mt-3 btn-primary btn-lg btn-wide" style="border-radius: 50px;"> التالي
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
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript">
        $(function() {
            $('#datetimepicker1').datepicker({
                format: "yyyy-mm",
                viewMode: "months",
                minViewMode: "months",
            });
        });
    </script>
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
@endsection
