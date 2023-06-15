@extends('layouts.admin')


@section("content")

<!-- Create Form Card -->
<div class="col-12">
    <div class="card shadow mb-4 border-bottom-primary">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">{{ __("Documents") }}</h6>
            <div class="dropdown no-arrow">
                <x-BackButton />
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="text-center">
                
                <div class="table-responsive">
                    <table class="table table-bordered table-light">
                        <tr>
                            <th>Name</th>
                            <td>
                                <?php
                                print_r($student_uploaded_docs);
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <form class="student_doc" method="POST" action="{{ route('student_doc.store') }}" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Father Income: <?php $father_income_certificate_path = Auth::user()->id . "/father_income_certificate" ?></label>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            @if(!empty($b64FatherIncomeImage) && isset($b64FatherIncomeImage))
                            <img src="{{ $b64FatherIncomeImage }}" height="auto" width="50%" class="img-thumbnail" alt="Photograph" />
                            @else
                            @livewire('services.media.uploadable',[
                            'file_name' => 'father_income_certificate',
                            'file' => 'father_income_certificate',
                            'path' => "$father_income_certificate_path",
                            'target' => 'father_income_certificate'
                            ])
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Photograph: <?php $photograph_path = Auth::user()->id . "/photograph" ?></label>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            @if(!empty($b64PhotographImage) && isset($b64PhotographImage))
                            <img src="{{ $b64PhotographImage }}" height="auto" width="50%" class="img-thumbnail" alt="Photograph" />
                            @else
                            @livewire('services.media.uploadable',[
                            'file_name' => 'photograph',
                            'file' => 'photograph',
                            'path' => "$photograph_path",
                            'target' => 'photograph'
                            ])
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Signature: <?php $signature_path = Auth::user()->id . "/signature" ?></label>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            @if(!empty($b64SignatureImage) && isset($b64SignatureImage))
                            <img src="{{ $b64SignatureImage }}" height="auto" width="50%" class="img-thumbnail" alt="Signature" />
                            @else
                            @livewire('services.media.uploadable',[
                            'file_name' => 'signature',
                            'file' => 'signature',
                            'path' => "$signature_path",
                            'target' => 'signature'
                            ])
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Thumb Impression: <?php $thumb_impression_path = Auth::user()->id . "/thumb_impression" ?></label>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            @if(!empty($b64ThumbImpressionImage) && isset($b64ThumbImpressionImage))
                            <img src="{{ $b64ThumbImpressionImage }}" height="auto" width="50%" class="img-thumbnail" alt="Thumb Impression" />
                            @else

                            @livewire('services.media.uploadable',[
                            'file_name' => 'thumb_impression',
                            'file' => 'thumb_impression',
                            'path' => "$thumb_impression_path",
                            'target' => 'thumb_impression'
                            ])  
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label class="control-label" for="aadhar_number">Aadhar Number:</label>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input id="aadhar_number" type="text" min="12" max="12" title="Enter Aadhar Number" placeholder="Enter Aadhar Number" name="aadhar_number" class="form-control">
                            <span id="lblError" style="display: none;" class="error">Invalid Aadhaar Number</span>

                            @error('aadhar_number')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror    
                        </div>
                    </div>



                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label class="control-label" for="aadhar_front">Aadhar Front: <?php $aadhar_front_path = Auth::user()->id . "/aadhar_front" ?></label>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            @if(!empty($b64AadharFrontImage) && isset($b64AadharFrontImage))
                            <img src="{{ $b64AadharFrontImage }}" height="auto" width="50%" class="img-thumbnail" alt="Aadhar Front Image" />
                            @else

                            @livewire('services.media.uploadable',[
                            'file_name' => 'aadhar_front',                            
                            'file' => 'aadhar_front',
                            'path' => "$aadhar_front_path",
                            'target' => 'aadhar_front'
                            ])  
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label class="control-label" for="aadhar_back">Aadhar Back: <?php $aadhar_back_path = Auth::user()->id . "/aadhar_back" ?></label>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">

                            @if(!empty($b64AadharBackImage) && isset($b64AadharBackImage))
                            <img src="{{ $b64AadharBackImage }}" height="auto" width="50%" class="img-thumbnail" alt="Aadhar Back Image" />
                            @else
                            @livewire('services.media.uploadable',[
                            'file_name' => 'aadhar_back',                            
                            'file' => 'aadhar_back',
                            'path' => "$aadhar_back_path",
                            'target' => 'aadhar_back'
                            ])  
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label class="control-label" for="high_school_marksheet">High School Marksheet: <?php $high_school_marksheet_path = Auth::user()->id . "/high_school_marksheet" ?></label>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">

                            @if(!empty($b64HighSchoolMrkshtImage) && isset($b64HighSchoolMrkshtImage))
                            <img src="{{ $b64HighSchoolMrkshtImage }}" height="auto" width="50%" class="img-thumbnail" alt="High School Marksheet" />
                            @else
                            @livewire('services.media.uploadable',[
                            'file_name' => 'high_school_marksheet',                            
                            'file' => 'high_school_marksheet',
                            'path' => "$high_school_marksheet_path",
                            'target' => 'high_school_marksheet'
                            ])  
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label class="control-label" for="high_school_marksheet">Intermediate Marksheet: <?php $intermediate_marksheet_path = Auth::user()->id . "/intermediate_marksheet" ?></label>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            @if(!empty($b64IntermediateMrksheetImage) && isset($b64IntermediateMrksheetImage))
                            <img src="{{ $b64IntermediateMrksheetImage }}" height="auto" width="50%" class="img-thumbnail" alt="Intermediate Marksheet" />
                            @else

                            @livewire('services.media.uploadable',[
                            'file_name' => 'intermediate_marksheet',                            
                            'file' => 'intermediate_marksheet',
                            'path' => "$intermediate_marksheet_path",
                            'target' => 'intermediate_marksheet'
                            ])  
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <input type="hidden" name="student_doc_id" value="{{$student_uploaded_docs->id ?? '0'}}" />
                        <input type="submit" id="uploadStudentDocs" class="btn btn-primary btn-user btn-block"
                               value="{{ __('Save') }}">
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>

<!--<script type="text/javascript">
    $ = jQuery.noConflict();
    $(function () {
        $("#uploadStudentDocs").on('keyup',function () {
            var regex = /^([0-9]{4}[0-9]{4}[0-9]{4}$)|([0-9]{4}\s[0-9]{4}\s[0-9]{4}$)|([0-9]{4}-[0-9]{4}-[0-9]{4}$)/;
            if (regex.test($("#aadhar_number").val())) {
                $("#lblError").css("visibility", "hidden");
            } else {
                $("#lblError").css("visibility", "visible");
            }
        });
    });
</script>-->

@endsection