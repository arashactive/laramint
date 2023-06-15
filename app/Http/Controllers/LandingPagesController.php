<?php

namespace App\Http\Controllers;

use App\Models\LandingPages;
use App\Models\StudentDocs;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use Mail;
use App\Mail\StudentMail;



class LandingPagesController extends Controller
{
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, StudentDocs $student_docs)
    {
        //

        $photograph = (isset($request->photograph) && $request->photograph!='photograph') ?  $request->photograph : '' ;
        $signature = (isset($request->signature) && $request->signature!='signature') ?  $request->signature : '' ;
        $thumb_impression = (isset($request->thumb_impression) && $request->thumb_impression!='thumb_impression') ?  $request->thumb_impression : '' ;
        $aadhar_front = (isset($request->aadhar_front) && $request->aadhar_front!='aadhar_front') ?  $request->aadhar_front : '' ;
        $aadhar_back = (isset($request->aadhar_back) && $request->aadhar_back!='aadhar_back') ?  $request->aadhar_back : '' ;
        $high_school_marksheet = (isset($request->high_school_marksheet) && $request->high_school_marksheet!='high_school_marksheet') ?  $request->high_school_marksheet : '' ;
        $intermediate_marksheet = (isset($request->intermediate_marksheet) && $request->intermediate_marksheet!='intermediate_marksheet') ?  $request->intermediate_marksheet : '' ;
        $aadhar_number = (isset($request->aadhar_number) && !empty($request->aadhar_number)) ?  $request->aadhar_number : '' ;
        $father_income_certificate = (isset($request->father_income_certificate) && !empty($request->father_income_certificate)) ?  $request->father_income_certificate : '' ;
        
        
        $student_docs->user_id =  isset($request->last_user_id) ? base64_decode($request->last_user_id) : Auth::user()->id;
        $student_docs->name = $request->name;
        $student_docs->mobile = $request->mobile;
        $student_docs->email = $request->email;
        $student_docs->father_name = $request->father_name;
        $student_docs->dob = $request->dob;
        $student_docs->category = $request->caste_category;
        $student_docs->high_school_marks = $request->high_school_marks;
        $student_docs->high_school_grades = $request->high_school_grades;
        
        $student_docs->intermediate_marks = $request->intermediate_marks;
        $student_docs->intermediate_grades = $request->intermediate_grades;
        
        $student_docs->father_income = $request->father_income;
        $student_docs->father_income_certificate = $father_income_certificate;
        
        $student_docs->photograph = $photograph;
        $student_docs->signature = $signature;
        $student_docs->thumb_impression = $thumb_impression;
        $student_docs->aadhar_number = $aadhar_number;
        $student_docs->aadhar_front = $aadhar_front;
        $student_docs->aadhar_back = $aadhar_back;
        $student_docs->high_school_marksheet = $high_school_marksheet;
        $student_docs->intermediate_marksheet = $intermediate_marksheet;
        
        $student_docs->is_mobile_verified = $request->is_mobile_verified;
        $student_docs->is_email_verified = $request->is_email_verified;
        $student_docs->referrer_url = $request->referrer_url;
        
        if(isset($request->student_doc_id) && $request->student_doc_id!=0){
            $student_docs->id = $request->student_doc_id;
//            print_r($student_docs);die;
            $student_docs->update($student_docs);
            return back()
                ->with('warning', __('item updated successfully'));
        }else{
            if($student_docs->save()){
                
                // now create user if first time entry..
                $user_doc_id = $student_docs->id;
                $this->create_user($user_doc_id,$request->name,$request->email);
                return back()
                ->with('success','You have successfully submitted your document(s). Please check your email.'); 
            }else{
                return back()
                ->with('errors','Some error occured.'); 
            }
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LandingPages  $landingPages
     * @return \Illuminate\Http\Response
     */
    public function show(LandingPages $landingPages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LandingPages  $landingPages
     * @return \Illuminate\Http\Response
     */
    public function edit(LandingPages $landingPages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LandingPages  $landingPages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LandingPages $landingPages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LandingPages  $landingPages
     * @return \Illuminate\Http\Response
     */
    public function destroy(LandingPages $landingPages)
    {
        //
    }
    
    public function landing_page_for($page_url) 
    {
        $lp_details = LandingPages::where('landing_page_url',$page_url)->first();
        if($lp_details)
        {
            $page_title = $lp_details->landing_page_title;
            $grades = array(
                '91-100'=>'A1',
                '81-90'=>'A2',
                '71-80'=>'B1',
                '61-70'=>'B2',
                '51-60'=>'C1',
                '41-50'=>'C2',
                '33-40'=>'D',
                '21-32'=>'E1',
                '00-20'=>'E2',
                );
            //1 for General, 2 for OBC, 3 for SC, 4 for ST, 5 for Others
            $caste_categories = array(1=>'General',2=>'OBC',3=>'SC',4=>'ST',5=>'Others');
            $last_user = User::orderby('id', 'desc')->select('id')->first();
            $last_user_id = $last_user->id;
            $last_user_id++;
            return view("contents.landing_pages.index", compact("page_title",'grades','caste_categories','last_user_id'));
        }
        else
        {
            return redirect()->route('home')->with('danger', 'Incorrect page');
        }
        
    }
    
    public function send_mail($mailData){
//        $sent= false;
        try {
            $sent_mail = Mail::to($mailData['email'])->send(new StudentMail($mailData));
//            var_dump($x);
//            $sent = true;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
//dd('mail sent');
    }
    
    public function create_user($user_doc_id,$name,$email){

        $random_pwd = Str::random(8);
        $check_email = User::where('email',$email)->where('name',$name)->first();
//        var_dump($check_email);
        if(!$check_email){
            // create user & send email with pwd
            $role4 = Role::where(['name' => 'student'])->first();
            $role4->givePermissionTo('myCourse.index');
            $student = \App\Models\User::factory()->create([
                'name' => $name,
                'user_doc_id' => $user_doc_id,
                'email' => $email,
                'password' => Hash::make($random_pwd),
            ]);
            $student->assignRole($role4);
            
            // now send email for passowrd
            $sent = $this->send_mail(['name'=>$name,'email'=>$email,'password'=>$random_pwd,'subject'=>'Welcome to ICET Agra']);
//        }else{
//            $this->send_mail(['name'=>$name,'email'=>$email,'password'=>$random_pwd]);
        }
        
    }
}
