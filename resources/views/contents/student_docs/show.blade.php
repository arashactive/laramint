@extends('layouts.admin')


@section("content")
<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    All uploaded Document(s)
                    
                </h6>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-condensed table-striped table-bordered">
                        <tbody>
                            <tr>
                                <th>{{ __('Father Income Certificate')}}</th>
                                <td>
                                    @if(!empty($b64FatherIncomeImage) && isset($b64FatherIncomeImage))
                                    <img src="{{ $b64FatherIncomeImage }}" height="25%" width="25%" class="img-thumbnail" alt="Photograph" />
                                    @else
                                    Not uploaded
                                    @endif
                                    
                                </td>
                            </tr>
                            <tr>
                                <th>{{ __('Photograph')}}</th>
                                <td>
                                    @if(!empty($b64PhotographImage) && isset($b64PhotographImage))
                                    <img src="{{ $b64PhotographImage }}" height="25%" width="25%" class="img-thumbnail" alt="Photograph" />
                                    @else
                                    Not uploaded
                                    @endif
                                    
                                </td>
                            </tr>
                            <tr>
                                <th>{{ __('Signature')}}</th>
                                <td>
                                    @if(!empty($b64SignatureImage) && isset($b64SignatureImage))
                                    <img src="{{ $b64SignatureImage }}" height="25%" width="25%" class="img-thumbnail" alt="Signature" />
                                    @else
                                    Not uploaded
                                    @endif
                                    
                                </td>
                            </tr>
                            <tr>
                                <th>{{ __('Thumb Impression')}}</th>
                                <td>
                                    @if(!empty($b64ThumbImpressionImage) && isset($b64ThumbImpressionImage))
                                    <img src="{{ $b64ThumbImpressionImage }}" height="25%" width="25%" class="img-thumbnail" alt="Thumb Impression" />
                                    @else
                                    Not uploaded
                                    @endif
                                    
                                </td>
                            </tr>
                            <tr>
                                <th>{{ __('Aadhar Number')}}</th>
                                <td>
                                    @if(!empty($aadhar_number) && isset($aadhar_number))
                                    {{ $aadhar_number }}
                                    @else
                                    Not uploaded
                                    @endif
                                    
                                </td>
                            </tr>
                            <tr>
                                <th>{{ __('Aadhar Front Image')}}</th>
                                <td>
                                    @if(!empty($b64AadharFrontImage) && isset($b64AadharFrontImage))
                                    <img src="{{ $b64AadharFrontImage }}" height="25%" width="25%" class="img-thumbnail" alt="Aadhar Front Image" />
                                    @else
                                    Not uploaded
                                    @endif
                                    
                                </td>
                            </tr>
                            <tr>
                                <th>{{ __('Aadhar Back Image')}}</th>
                                <td>
                                    @if(!empty($b64AadharBackImage) && isset($b64AadharBackImage))
                                    <img src="{{ $b64AadharBackImage }}" height="25%" width="25%" class="img-thumbnail" alt="Aadhar Back Image" />
                                    @else
                                    Not uploaded
                                    @endif
                                    
                                </td>
                            </tr>
                            <tr>
                                <th>{{ __('High School Marksheet')}}</th>
                                <td>
                                    @if(!empty($b64HighSchoolMrkshtImage) && isset($b64HighSchoolMrkshtImage))
                                    <img src="{{ $b64HighSchoolMrkshtImage }}" height="25%" width="25%" class="img-thumbnail" alt="High School Marksheet" />
                                    @else
                                    Not uploaded
                                    @endif
                                    
                                </td>
                            </tr>
                            <tr>
                                <th>{{ __('Intermediate Marksheet')}}</th>
                                <td>
                                    @if(!empty($b64IntermediateMrksheetImage) && isset($b64IntermediateMrksheetImage))
                                    <img src="{{ $b64IntermediateMrksheetImage }}" height="25%" width="25%" class="img-thumbnail" alt="Intermediate Marksheet" />
                                    @else
                                    Not uploaded
                                    @endif
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>


    @endsection