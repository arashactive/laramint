<div>
    
    <select name="roles[]" wire:model="roles" class="select form-control" multiple>
        @forelse ($roles as $role)
            <option {{ is_array($user) && in_array($role->name , $user) ? 'selected' : '' }} 
                value="{{ $role->id }}">{{ $role->name }}</option>
        @empty
        @endforelse
    </select>
</div>