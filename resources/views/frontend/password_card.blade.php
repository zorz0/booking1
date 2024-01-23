@extends('frontend.layouts.master')


@section('content')
    <form action="{{ route('checkOtpCodePassword') }}" method="post">
        @method('POST')
        @csrf
        <section class="mosafer-deatels p-5 text-center">
{{--            <input type="hidden" name="client_id" value="{{ $client->id }}">--}}
            <div class=".container-fluid">
                <div class="bayanat-box mt-5 p-3">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 p-2">
                            <h3> يرجى ادخال رمز التحقق المكون من 4 ارقام  </h3>

                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">

                <div class="bayanat-box mt-5 p-3">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 p-2">
                            <div class="box-1-bayanat-2 mb-3 ">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-lg-6">
                                        <div class="form-control">
                                            <label for="" class="d-block"> ادخل كلمة المرور </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-control overflow-hidden mb-3">
                                            <input class="border" type="text" id="card_no" name="password" maxlength="4">
                                        </div>
                                        @error('password')
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
                    <div class="col-lg-6">
                        <button _ngcontent-ttv-c186="" class="btn btn-warning p-2 mt-3 " style="border-radius: 20px;">العودة
                            للخلف </button>
                    </div>
                    <div class="col-lg-6">
                        <button _ngcontent-ttv-c186="" appdebounceclick="" type="submit" id="nxtButton"
                            class="btn mt-3 btn-primary btn-lg btn-wide" style="border-radius: 50px;"> حفظ
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
@endsection
