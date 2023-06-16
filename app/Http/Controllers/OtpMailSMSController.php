<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOtpMailSMSRequest;
use App\Http\Requests\UpdateOtpMailSMSRequest;
use App\Models\OtpMailSMS;
use App\Models\StudentDocs;
use Illuminate\Http\Request;
use Mail;
use App\Mail\StudentMail;
use App\Models\User;

class OtpMailSMSController extends Controller {

    public $api_key = 'XwyZHQrajqWubf2iNCcsF0REpLGme9IUzdBSMonD4Y36t7vxlh4Hn5qXkx6cieSCVdw1INO3gEQTlMDR';
    public $api_url = "https://www.fast2sms.com/dev/bulkV2";
    public $OTP_wait_time = "-10 minutes";
    public $otp_wtp_msg = 'Dear Student, Kindly enter OTP code: <otp_code> to verify your account with ICET, Agra';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOtpMailSMSRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOtpMailSMSRequest $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OtpMailSMS  $otpMailSMS
     * @return \Illuminate\Http\Response
     */
    public function show(OtpMailSMS $otpMailSMS) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OtpMailSMS  $otpMailSMS
     * @return \Illuminate\Http\Response
     */
    public function edit(OtpMailSMS $otpMailSMS) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOtpMailSMSRequest  $request
     * @param  \App\Models\OtpMailSMS  $otpMailSMS
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOtpMailSMSRequest $request, OtpMailSMS $otpMailSMS) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OtpMailSMS  $otpMailSMS
     * @return \Illuminate\Http\Response
     */
    public function destroy(OtpMailSMS $otpMailSMS) {
        //
    }

    public function verify_mobile(Request $request) {
        $send_otp = false;
//        $http_refferer = Request::server('HTTP_REFERER'); //request()->headers->get('referer');
        $referrer_url = $request->referrer_url;
        $last_user_id = base64_decode($request->last_user_id);
        $page_id = $request->page_id;
        $to_mobile = $request->student_mobile;

        if (strlen($to_mobile) != 10) {
            $msg = 'Invalid phone number';
            $status = 'Failed';
            if (str_starts_with($to_mobile, 0)) {
                $msg = 'Remove 0 from the mobile number';
            }
        } else {
            $otp_code = rand(100001, 999999);

            $userOTPRecord = OtpMailSMS::where('mobile', $to_mobile)->orderby('id', 'desc')->first();
            if ($userOTPRecord) {
                // it means SMS already send now check if it sent within 10 minutes..
                if (strtotime($userOTPRecord->mobile_otp_sent_at) < strtotime($this->OTP_wait_time)) {
//               echo 'less than '.$this->OTP_wait_time.' minutes'; 
                    $send_otp = true;
                } else {
//                echo 'send OTP';
                    $send_otp = false;
                }
            } else {
                // means no record found.. now send OTP
                $send_otp = true;
            }
            if ($send_otp) {
                $api_response = $this->send_sms($to_mobile, $otp_code);
//                $api_response = '{"return":true,"request_id":"o5mt2xen9zk046q","message":["SMS sent successfully."]}'; // this is sample result
//            echo $api_response;die;
                $decode_json = json_decode($api_response, true);
                
                if ($decode_json['return'] == 1) {
                    
                    // success
                    $sms_request_id = $decode_json['request_id'];

                    // now save the code in DB to match in future..

                    if ($userOTPRecord) {
                        $userOTPRecord->update(['sms_request_id' => $sms_request_id, 'user_id' => $last_user_id, 'mobile' => $to_mobile, 'mobile_otp' => $otp_code, 'mobile_otp_sent_at' => date('Y-m-d H:i:s'), 'mobile_otp_from_url' => urlencode(
                                    $referrer_url)]);
                    } else {
                        $newOTPObj = new OtpMailSMS();
//                    OtpMailSMS::save(['sms_request_id'=>$sms_request_id,'user_id'=>$last_user_id,'mobile'=>$to_mobile,'mobile_otp'=>$otp_code,'mobile_otp_sent_at'=>date('Y-m-d H:i:s')]);
                        $newOTPObj->sms_request_id = $sms_request_id;
                        $newOTPObj->user_id = $last_user_id;
                        $newOTPObj->mobile = $to_mobile;
                        $newOTPObj->mobile_otp = $otp_code;
                        $newOTPObj->mobile_otp_sent_at = date('Y-m-d H:i:s');
                        $newOTPObj->mobile_otp_from_url = $referrer_url;
                        $newOTPObj->save();
                    }

                    $msg = $decode_json['message'][0];
                    $status = 'Success';
                } else {
                    $msg = 'some error occured.';
                    $status = 'failed';
                }
            } else {
                $msg = 'Wait for 10 minutes.';
                $status = 'Failed';
            }
        }
        echo json_encode(array('status' => $status, 'msg' => $msg));
        die;
    }

    function sendSMS(Request $request) {
        $to_mobile = $request->student_mobile;
        $otp_code = rand(10001, 99999);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2?authorization=2QOUj1e5m8KsHk3RvCwybr49qAWhZEFDMz6aLdIJclYSgpVtiup3aQHU9dkEmcJ7nYtjXizrPhRWZfSs&route=otp&variables_values={$otp_code}&flash=0&numbers=" . $to_mobile,
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

    function send_sms($to_mobile, $otp_code) {
//        $to_mobile = $request->student_mobile;
//        $user_id = $request->user_id;
//        $otp_code = rand(10001,99999);

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
                "authorization: " . $this->api_key,
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
            return $response;
        }
    }

    public function sendMailOTP(Request $request) {

        $http_refferer = request()->headers->get('referer');

        $student_mobile = $request->student_mobile;
        $student_email = $request->student_email;
        $user_id = $request->user_id;
        $otp_code = rand(100001, 999999);

        // before sending email let us check if email already registered..
        $user_details = User::where('email', $student_email)->first();
        if (!empty($user_details) && $user_details->email == $student_email) {
            $msg = 'Attention! Email already registered.';
//            return redirect()->back()->with('success', $msg);
            $return_array = ['status_code' => 'warning', 'message' => $msg];
        } else {


            $mailData['email'] = $student_email;
            $mailData['subject'] = 'ICET email verification for \'O\' Level scheme';
            $mailData['otp_code'] = $otp_code;
            $mail_response = Mail::to($mailData['email'])->send(new StudentMail($mailData));
            if ($mail_response) {
                // save to database as well..
                // check if mobile is already registered..
                $userOTPRecord = OtpMailSMS::where('mobile', $student_mobile)->orderby('id', 'desc')->first();
                if ($userOTPRecord) {
                    // update
                    $userOTPRecord->update(['mail' => $student_email, 'mail_otp' => $otp_code, 'mail_otp_sent_at' => now(), 'is_mail_verified' => 0, 'mail_otp_from_url' => urlencode(
                                $http_refferer)]);
                } else {
                    // add
                    OtpMailSMS::create(['mail' => $student_email, 'mail_otp' => $otp_code, 'mail_otp_sent_at' => now(), 'is_mail_verified' => 0, 'mail_otp_from_url' => urlencode(
                                $http_refferer), 'mobile' => $student_mobile]);
                }
                $msg = 'Success! OTP shared on your email successfully!';
                //            return redirect()->back()->with('success', $msg);
                $return_array = ['status_code' => 'success', 'message' => $msg];
            } else {
                $msg = 'Fail! some error occured.';
                $return_array = ['status_code' => 'danger', 'message' => $msg];
            }
        }
        echo json_encode($return_array);
    }

    public function validateMailOTP(Request $request) {
        $student_email = $request->student_email;
        $email_otp = $request->email_otp;
        $userOTPRecord = OtpMailSMS::where('mail', $student_email)->orderby('id', 'desc')->first();
        $dbMailOTP = $userOTPRecord->mail_otp;
        if ($email_otp == $dbMailOTP) {
            $userOTPRecord->update(['is_mail_verified' => 1, 'mail_otp_verified_at' => now()]);
            // mail OTP matcjed
            $msg = 'Success! Mail verified successfully!';
            $return_array = ['status_code' => 'success', 'message' => $msg];
        } else {
            // error
            $msg = 'Fail! Invalid OTP.';
            $return_array = ['status_code' => 'danger', 'message' => $msg];
        }
        echo json_encode($return_array);
    }

    public function validateSMSOTP(Request $request) {
        $student_mobile = $request->student_mobile;

        $sms_otp = $request->sms_otp;

        $userOTPRecord = OtpMailSMS::where('mobile', $student_mobile)->orderby('id', 'desc')->first();
        $dbSMSOTP = $userOTPRecord->mobile_otp;
        if ($sms_otp == $dbSMSOTP) {
            $userOTPRecord->update(['is_mobile_verified' => 1, 'mobile_otp_verified_at' => now()]);
            // mail OTP matcjed
            $msg = 'Success! Mobile verified successfully!';
            $return_array = ['status_code' => 'success', 'message' => $msg];
        } else {
            // error
            $msg = 'Fail! Invalid OTP entered.';
            $return_array = ['status_code' => 'danger', 'message' => $msg];
        }
        echo json_encode($return_array);
    }

    public function isMobileExists(Request $request) {
        $student_mobile = $request->student_mobile;
        $return = $this->checkIfMobileAlreadyExistsValidate($student_mobile);
        echo json_encode($return);
    }

    public function checkIfMobileAlreadyExistsValidate($mobile) {
//        $mobile='7618565001';
        $return_array = array('is_mobile_verified' => 0, 'is_email_verified' => 0);
        // first of all check if the mobile is already registered
        $userRecord = StudentDocs::where('mobile', $mobile)->orderby('id', 'desc')->first();
        if ($userRecord) {
            // record found.. now check if validated as well
            $is_mobile_verified = $userRecord->is_mobile_verified;
            $is_email_verified = $userRecord->is_email_verified;
//            if($is_mobile_verified==1 && (empty($is_email_verified) || $is_mobile_verified==0)){
//                // means email is not verified but mobile is verified it means we have to disable verify mobile & enable mail OTP
//                $return_array['status_code'] = 'failed';
//                $return_array['message'] = 'Mobile already registered & verified!';
//                $return_array['is_mobile_verified'] = 1;
//                $return_array['is_email_verified'] = 0;
//            }
//            if($is_mobile_verified==1 && $is_email_verified==1){
//                // means email is verified as well as mobile it means we have to disable verify mobile & as well email & ask for login
//                $return_array['status_code'] = 'failed';
//                $return_array['message'] = 'Mobile & email already registered & verified!';
//                $return_array['is_mobile_verified'] = 1;
//                $return_array['is_email_verified'] = 1;
//            }
////            if($is_mobile_verified!=1 && $is_email_verified==1){
////                // means email is verified as well as mobile it means we have to disable verify mobile & as well email & ask for login
////                $return_array['status_code'] = 'failed';
////                $return_array['message'] = 'Email already registered & verified!';
////                $return_array['is_mobile_verified'] = 0;
////                $return_array['is_email_verified'] = 1;
////            }
//            if((empty($is_mobile_verified) || $is_mobile_verified==0) && $is_mobile_verified==1){
//                // means mobile is not verified but email is verified it means we have to disable verify email & enable mobile OTP
//                $return_array['status_code'] = 'failed';
//                $return_array['message'] = 'Email already registered & verified!';
//                $return_array['is_mobile_verified'] = 0;
//                $return_array['is_email_verified'] = 1;
//            }
            $return_array['is_mobile_verified'] = ($is_mobile_verified != NULL) ? $is_mobile_verified : 0;
            $return_array['is_email_verified'] = ($is_email_verified != NULL) ? $is_email_verified : 0;
        }

        return $return_array;
    }

}
