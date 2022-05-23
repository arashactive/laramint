<div>
  <select name="{{ $name }}" class="form-control form-select form-select-lg mb-3" 
    aria-label="form-select-lg example">
    <option>Open this select menu</option>
    
    @forelse ($model as $key => $value)
      
      <option {{ ($selected > 0) && $selected == $key ? "selected" : "" }} value="{{ $key }}">{{ $value }}</option>
    @empty
        
    @endforelse
  
  </select>
</div>