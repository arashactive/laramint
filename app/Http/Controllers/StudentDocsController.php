<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StudentDocs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDocsController extends Controller
{
    public $upload_student_doc_folder = '/student_docs';
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
    public function create( StudentDocs $student_docs)
    {
        //
//        var_dump(Auth::user()->id);
        $student_uploaded_docs = $student_docs->where('user_id',Auth::user()->id)->first();
//        print($student_uploaded_docs);die;
//        $this->authorize('student_docs.index');
        $b64FatherIncomeImage =  !empty($student_uploaded_docs->photograph) ? $this->base64_encode_image($student_uploaded_docs->photograph): '';
        $b64PhotographImage =  !empty($student_uploaded_docs->photograph) ? $this->base64_encode_image($student_uploaded_docs->photograph): '';
        $b64SignatureImage = !empty($student_uploaded_docs->signature) ? $this->base64_encode_image($student_uploaded_docs->signature) : '';
        $b64ThumbImpressionImage = !empty($student_uploaded_docs->thumb_impression) ? $this->base64_encode_image($student_uploaded_docs->thumb_impression) : '';
        $aadhar_number = !empty($student_uploaded_docs->aadhar_number) ? $student_uploaded_docs->aadhar_number : '';
        $b64AadharFrontImage = !empty($student_uploaded_docs->aadhar_front) ? $this->base64_encode_image($student_uploaded_docs->aadhar_front) : '';
        $b64AadharBackImage = !empty($student_uploaded_docs->aadhar_back) ? $this->base64_encode_image($student_uploaded_docs->aadhar_back) : '';
        $b64HighSchoolMrkshtImage = !empty($student_uploaded_docs->high_school_marksheet) ? $this->base64_encode_image($student_uploaded_docs->high_school_marksheet) : '';
        $b64IntermediateMrksheetImage = !empty($student_uploaded_docs->intermediate_marksheet) ? $this->base64_encode_image($student_uploaded_docs->intermediate_marksheet) : '';
        return view('contents.student_docs.form',compact('student_uploaded_docs',
                'b64FatherIncomeImage','b64PhotographImage','b64SignatureImage','b64ThumbImpressionImage',
                'aadhar_number','b64AadharFrontImage','b64AadharBackImage','b64HighSchoolMrkshtImage','b64IntermediateMrksheetImage'
                ));
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
//        $this->validate($request, [
//            'aadhar_number' => 'digits:12'
//        ]);
//        echo "<pre>";print_r($request->all());
//        die;
        
        $photograph = (isset($request->photograph) && $request->photograph!='photograph') ?  $request->photograph : '' ;
        $signature = (isset($request->signature) && $request->signature!='signature') ?  $request->signature : '' ;
        $thumb_impression = (isset($request->thumb_impression) && $request->thumb_impression!='thumb_impression') ?  $request->thumb_impression : '' ;
        $aadhar_front = (isset($request->aadhar_front) && $request->aadhar_front!='aadhar_front') ?  $request->aadhar_front : '' ;
        $aadhar_back = (isset($request->aadhar_back) && $request->aadhar_back!='aadhar_back') ?  $request->aadhar_back : '' ;
        $high_school_marksheet = (isset($request->high_school_marksheet) && $request->high_school_marksheet!='high_school_marksheet') ?  $request->high_school_marksheet : '' ;
        $intermediate_marksheet = (isset($request->intermediate_marksheet) && $request->intermediate_marksheet!='intermediate_marksheet') ?  $request->intermediate_marksheet : '' ;
        $aadhar_number = (isset($request->aadhar_number) && !empty($request->aadhar_number)) ?  $request->aadhar_number : '' ;
        $father_income_certificate = (isset($request->father_income_certificate) && $request->father_income_certificate!='father_income_certificate') ?  $request->father_income_certificate : '' ;
        
        
        $student_docs->user_id =  isset($request->last_user_id) ? base64_decode($request->last_user_id) : Auth::user()->id;
        $student_docs->name = $request->name;
        $student_docs->mobile = $request->mobile;
        $student_docs->email = $request->email;
        $student_docs->father_name = $request->father_name;
        $student_docs->dob = $request->dob;
        $student_docs->category = $request->category;
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
        
        if(isset($request->student_doc_id) && $request->student_doc_id!=0){
            $student_docs->id = $request->student_doc_id;
//            print_r($student_docs);die;
            $student_docs->update($student_docs);
            return back()
                ->with('warning', __('item updated successfully'));
        }else{
            if($student_docs->save()){
                return back()
                ->with('success','You have successfully upload image(s).'); 
            }else{
                return back()
                ->with('errors','Some error occured.'); 
            }
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentDocs  $studentDocs
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        
//        $studentDocs = new StudentDocs();
        $user_id = Auth::user()->id;
        $student_uploaded_docs = StudentDocs::where('user_id',$user_id)->first();
//        print_r($student_uploaded_docs);die;
        $b64PhotographImage =  !empty($student_uploaded_docs->photograph) ? $this->base64_encode_image($student_uploaded_docs->photograph): '';
        $b64SignatureImage = !empty($student_uploaded_docs->signature) ? $this->base64_encode_image($student_uploaded_docs->signature) : '';
        $b64ThumbImpressionImage = !empty($student_uploaded_docs->thumb_impression) ? $this->base64_encode_image($student_uploaded_docs->thumb_impression) : '';
        $aadhar_number = !empty($student_uploaded_docs->aadhar_number) ? $student_uploaded_docs->aadhar_number : '';
        $b64AadharFrontImage = !empty($student_uploaded_docs->aadhar_front) ? $this->base64_encode_image($student_uploaded_docs->aadhar_front) : '';
        $b64AadharBackImage = !empty($student_uploaded_docs->aadhar_back) ? $this->base64_encode_image($student_uploaded_docs->aadhar_back) : '';
        $b64HighSchoolMrkshtImage = !empty($student_uploaded_docs->high_school_marksheet) ? $this->base64_encode_image($student_uploaded_docs->high_school_marksheet) : '';
        $b64IntermediateMrksheetImage = !empty($student_uploaded_docs->intermediate_marksheet) ? $this->base64_encode_image($student_uploaded_docs->intermediate_marksheet) : '';
        return view('contents.student_docs.show',compact('student_uploaded_docs',
                'b64PhotographImage','b64SignatureImage','b64ThumbImpressionImage',
                'aadhar_number','b64AadharFrontImage','b64AadharBackImage','b64HighSchoolMrkshtImage','b64IntermediateMrksheetImage'
                ));
    }
    
    function base64_encode_image ($filename=string) {
        if ($filename) {
            $filename = 'storage/'.$filename;
            $filetype = pathinfo($filename, PATHINFO_EXTENSION);
            $imgbinary = fread(fopen($filename, "r"), filesize($filename));
            return 'data:image/' . $filetype . ';base64,' . base64_encode($imgbinary);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentDocs  $studentDocs
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentDocs $studentDocs)
    {
        die('m herer');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentDocs  $studentDocs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentDocs $studentDocs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentDocs  $studentDocs
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentDocs $studentDocs)
    {
        //
    }
}
