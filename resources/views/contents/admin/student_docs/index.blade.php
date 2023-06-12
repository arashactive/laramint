@extends('layouts.admin')


@section("content")
<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-uppercase">{{ __('Student Documents') }}</h6>

                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    
                </div>
            </div>


            <!-- Card Body -->
            <div class="card-body">
                <div class="text-center">


                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __("Student Name") }}</th>
                                <th scope="col">{{ __("Mobile") }}</th>
                                <th scope="col">{{ __("Email") }}</th>
                                <th scope="col">{{ __("Is Mobile Verified") }}</th>
                                <th scope="col">{{ __("Is Email Verified") }}</th>

                                @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['department.edit' , 'department.delete']))
                                <th scope="col">{{ __("Action") }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($student_docs as $student_doc)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    {{ $student_doc->name }}
                                </td>
                                <td>
                                    <a title="send reminder on whatsapp" href="`https://wa.me/{{ $student_doc->mobile }}?text={{urlencode($whatsAppReminderMsg)}}`" target="_blank"> {{ $student_doc->mobile }}</a>
                                </td>
                                <td>
                                    {{ $student_doc->email }}
                                </td>
                                <td>
                                    <i class="fa fa-{{ $student_doc->is_mobile_verified ? 'check-circle text-success' : 'times-circle text-danger' }}"></i>
                                </td>
                                <td>
                                    <i class="fa fa-{{ $student_doc->is_email_verified ? 'check-circle text-success' : 'times-circle text-danger' }}"></i>
                                </td>




                                <td>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                                            <div class="dropdown-header">{{ __('Actions') }}:</div>
                                            @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['department.edit' , 'department.delete']))
                                            @can('document.edit')
                                            <x-EditButton itemId="{{ $student_doc->id }}" path="document.edit" />
                                            @endcan
                                            @can('document.delete')
                                            <x-DeleteButton itemId="{{ $student_doc->id }}" path="document.destroy" />
                                            @endcan
                                            @endif
                                            <div class="dropdown-divider"></div>
                                            @can('document.show')
                                            <x-buttons.show itemId="{{ $student_doc->id }}" path="document.show" />
                                            @endcan
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>

                    <hr />
                    <div class="text-center">
                        {!! $student_docs->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>


    @endsection