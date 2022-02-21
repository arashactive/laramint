@extends('layouts.admin')


@section("content")
<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __("logs") }}</h6>
               
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="text-center">
    
                    
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __("name") }}</th>
                        <th scope="col">{{ __("description") }}</th>
                        <th scope="col">{{ __("subject") }}</th>
                        <th scope="col">{{ __("user") }}</th>
                        <th scope="col">{{ __("action time") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($logs as $log)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $log->log_name }}</td>
                                <td>
                                    <span class="badge badge-pill badge-{{$theme[$log->description] ?? 'primary' }}">{{ $log->description }}</span>
                                </td>
                                <td>{{ $log->subject->title ?? $log->subject_type }}</td>                                
                                <td>{{ $log->causer->name ?? '' }}</td>                                
                                <td>{{ $log->created_at }}</td>  
                            </tr>
                        @empty
                            
                        @endforelse                        
                    </tbody>
                </table>
                
                <hr/>
                <div class="text-center">
                    {!! $logs->links() !!}
                </div>

                </div>
            </div>
        </div>
    </div>


@endsection
{{-- 
<div class="row text-center d-flex justify-content-center">
    <x-buttons.pill name="terms" count="{{ $log->Term->count() }}" theme="dark" />
    <x-buttons.pill name="course" count="{{ $log->Course->count() }}" theme="warning" />
</div> --}}