<div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        
        <select name="department_id" 
        wire:change="selectDepartment" 
        wire:model="department_id"
        class="form-control form-select form-select-lg mb-3">
            <option>{{ __('Please Selected one') }}</option>
            
            @forelse ($departments as $department)
                <option {{ ($department_id == $department->id) ? "selected" : "" }} value="{{ $department->id }}">{{$department->title }}</option>
            @empty
                
            @endforelse            
        </select>
    </div>
    <div class="col-sm-6 mb-3 mb-sm-0">

        <select name="course_id" id="" class="form-control form-select form-select-lg mb-3">
            <option>{{ __('Please Selected one') }}</option>
                
            @forelse ($courses as $course)
                <option {{ ($course_id == $course->id) ? "selected" : "" }} value="{{ $course->id }}">{{$course->title }}</option>
            @empty
            @endforelse            
        </select>

    </div>
</div>
