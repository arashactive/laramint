<?php

namespace App\Http\Controllers;

use App\Models\WhatsAppDigitalSMSAPI;
use Illuminate\Http\Request;

class WhatsAppDigitalSMSAPIController extends Controller
{
    
    public $mobile_from  = '9510209429';
    public $api_key  = '3e78ebedd87716cbe266e1d63c92a72d';    
    public $otp_wtp_msg = 'Dear Student, Kindly enter OTP code: <otp_code> to verify your account with ICET, Agra';
    private $sms_api_url = 'https://demo.digitalsms.biz/api/?apikey=<api_key>&mobile=<receiver_mobile>&msg=<msg>';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // in future create form to update API key.. & Number.. 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // save information of the key & number in the database
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WhatsAppDigitalSMSAPI  $whatsAppDigitalSMSAPI
     * @return \Illuminate\Http\Response
     */
    public function show(WhatsAppDigitalSMSAPI $whatsAppDigitalSMSAPI)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WhatsAppDigitalSMSAPI  $whatsAppDigitalSMSAPI
     * @return \Illuminate\Http\Response
     */
    public function edit(WhatsAppDigitalSMSAPI $whatsAppDigitalSMSAPI)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WhatsAppDigitalSMSAPI  $whatsAppDigitalSMSAPI
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WhatsAppDigitalSMSAPI $whatsAppDigitalSMSAPI)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WhatsAppDigitalSMSAPI  $whatsAppDigitalSMSAPI
     * @return \Illuminate\Http\Response
     */
    public function destroy(WhatsAppDigitalSMSAPI $whatsAppDigitalSMSAPI)
    {
        //
    }
    
    
    public function verify_mobile(Request $request) {

        $http_refferer = request()->headers->get('referer'); //request()->headers->get('referer');

        $page_id = $request->page_id;
        $otp_wtp_msg = $this->otp_wtp_msg;
        $to_mobile = $request->student_mobile;
        
        $otp_code = rand(10001,99999);
        // now save the code in DB to match in future..
        
        
        $msg = $this->otp_wtp_msg;
        $final_msg = strtr($msg,array('<otp_code>'=>$otp_code));
        $api_response = $this->sendSMS($to_mobile,$final_msg);
        $decode_json = json_decode($api_response,true);
        
        if($decode_json['status']==1){
            // success
            // now save the code in DB to match in future..
//            $otp_code
            $msg = $decode_json['message'].'! OTP shared on your whatsApp successfully!';
            return redirect()->back()->with('success', $msg);
        }else{
            $msg = $decode_json['message'].'! some error occured.';
            return redirect()->back()->with('danger', $msg);
        }
    }
    
    public function testSMS() {

        $to_mobile = '7618565004';
        
        $otp_code = rand(10001,99999);
        // now save the code in DB to match in future..
        
        
        $msg = $this->otp_wtp_msg;
        $final_msg = strtr($msg,array('<otp_code>'=>$otp_code));
        
        $api_response = $this->sendSMS($to_mobile,$final_msg);
        $decode_json = json_decode($api_response,true);
        
        if($decode_json['status']==1){
            // success
            $msg = $decode_json['message'].'! OTP shared on your whatsApp successfully!';
            return redirect()->back()->with('success', $msg);
        }else{
            $msg = $decode_json['message'].'! some error occured.';
            return redirect()->back()->with('danger', $msg);
        }

    }
    
    public function sendSMS($to_mobile,$sms_msg) {
        
        $sms_api_url = strtr(
                $this->sms_api_url,array(
            '<api_key>'=> $this->api_key,
            '<receiver_mobile>'=> $to_mobile,
            '<msg>'=> urlencode($sms_msg)
                ));
//      echo $sms_msg;echo "<br/>",$sms_api_url;
        return $this->curl_get_contents($sms_api_url);
        
    }
    
    
    
    function curl_get_contents($url)
    {
        $ch = curl_init();                       // initialize CURL
        curl_setopt($ch, CURLOPT_POST, false);    // Set CURL Post Data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);                         // Close CURL

        // Use file get contents when CURL is not installed on server.
        if(!$output){
           $output =  file_get_contents($url);  
        }
        return $output;
    }



}
