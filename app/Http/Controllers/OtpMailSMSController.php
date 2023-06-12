<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOtpMailSMSRequest;
use App\Http\Requests\UpdateOtpMailSMSRequest;
use App\Models\OtpMailSMS;
use Illuminate\Http\Request;

use Mail;
use App\Mail\StudentMail;

class OtpMailSMSController extends Controller
{
    
    public $api_key  = '2QOUj1e5m8KsHk3RvCwybr49qAWhZEFDMz6aLdIJclYSgpVtiup3aQHU9dkEmcJ7nYtjXizrPhRWZfSs';
    public $api_url  = "https://www.fast2sms.com/dev/bulkV2";
    public $otp_wtp_msg = 'Dear Student, Kindly enter OTP code: <otp_code> to verify your account with ICET, Agra';
    
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOtpMailSMSRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOtpMailSMSRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OtpMailSMS  $otpMailSMS
     * @return \Illuminate\Http\Response
     */
    public function show(OtpMailSMS $otpMailSMS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OtpMailSMS  $otpMailSMS
     * @return \Illuminate\Http\Response
     */
    public function edit(OtpMailSMS $otpMailSMS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOtpMailSMSRequest  $request
     * @param  \App\Models\OtpMailSMS  $otpMailSMS
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOtpMailSMSRequest $request, OtpMailSMS $otpMailSMS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OtpMailSMS  $otpMailSMS
     * @return \Illuminate\Http\Response
     */
    public function destroy(OtpMailSMS $otpMailSMS)
    {
        //
    }
    
    public function verify_mobile(Request $request) {

        $http_refferer = Request::server('HTTP_REFERER'); //request()->headers->get('referer');

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
   
    function sendSMS(Request $request)
    {
        $to_mobile = $request->student_mobile;
        $otp_code = rand(10001,99999);
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2?authorization=2QOUj1e5m8KsHk3RvCwybr49qAWhZEFDMz6aLdIJclYSgpVtiup3aQHU9dkEmcJ7nYtjXizrPhRWZfSs&route=otp&variables_values={$otp_code}&flash=0&numbers=".$to_mobile,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
        
    }
    
    function send_sms(Request $request)
    {
        $to_mobile = $request->student_mobile;
        $user_id = $request->user_id;
        $otp_code = rand(10001,99999);
        // before sending OTP save to database

        $otpSMS = OtpMailSMS();
        $otpSMS->user_id = $user_id;
        $otpSMS->mobile = $to_mobile;
        $otpSMS->mobile_otp = $otp_code;
        $otpSMS->mobile_otp_sent_at = date('Y-m-d H:i:s');
        
        $fields = array(
            "variables_values" => "$otp_code",
            "route" => "otp",
            "numbers" => "$to_mobile",
        );

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $this->api_url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($fields),
          CURLOPT_HTTPHEADER => array(
            "authorization: ".$this->api_key,
            "accept: */*",
            "cache-control: no-cache",
            "content-type: application/json"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }

        
    }
    
    public function sendMailOTP(Request $request) {
        
        $http_refferer = request()->headers->get('referer');
        
        $student_mobile = $request->student_mobile;
        $student_email = $request->student_email;
        $user_id = $request->user_id;
        $otp_code = rand(10001,99999);
        $mailData['email'] = $student_email;
        $mailData['subject'] = 'ICET email verification for O Level scheme';
        $mailData['otp_code'] = $otp_code;
        $mail_response = Mail::to($mailData['email'])->send(new StudentMail($mailData));
        if($mail_response){
            // save to database as well..
            // check if mobile is already registered..
            $userOTPRecord = OtpMailSMS::where('mobile',$student_mobile)->orderby('id','desc')->first();
            if($userOTPRecord){
                // update
                $userOTPRecord->update(['mail_otp'=>$otp_code,'mail_otp_sent_at'=>now(),'is_mail_verified'=>0,'mail_otp_from_url'=> urlencode(
                        $http_refferer)]);
            }else{
                // add
                OtpMailSMS::create(['mail'=>$student_email,'mail_otp'=>$otp_code,'mail_otp_sent_at'=>now(),'is_mail_verified'=>0,'mail_otp_from_url'=> urlencode(
                        $http_refferer),'mobile'=>$student_mobile]);
            }
            $msg = 'Success! OTP shared on your email successfully!';
//            return redirect()->back()->with('success', $msg);
            $return_array = ['status_code'=>'success','message'=>$msg];
        }else{
            $msg = 'Fail! some error occured.';
            $return_array = ['status_code'=>'danger','message'=>$msg];
        }
        echo json_encode($return_array);
    }
    
    public function validateMailOTP(Request $request) {
        $student_email = $request->student_email;
        $email_otp = $request->email_otp;
        $userOTPRecord = OtpMailSMS::where('mail',$student_email)->orderby('id','desc')->first();
        $dbMailOTP = $userOTPRecord->mail_otp;
        if($email_otp==$dbMailOTP){
            $userOTPRecord->update(['is_mail_verified'=>1,'mail_otp_verified_at'=>now()]);
            // mail OTP matcjed
            $msg = 'Success! OTP verified successfully!';
            $return_array = ['status_code'=>'success','message'=>$msg];
            
        }else{
            // error
            $msg = 'Fail! some error occured.';
            $return_array = ['status_code'=>'danger','message'=>$msg];
        }
        echo json_encode($return_array);
    }

}
