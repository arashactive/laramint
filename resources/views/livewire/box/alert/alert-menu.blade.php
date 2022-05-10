<div>
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter">{{ count($notifications->whereNull('read_at')) . '+' }}</span>
        </a>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
                Alerts Center
            </h6>
            @forelse($notifications->take(5) as $notification)
            <a class="dropdown-item d-flex align-items-center" wire:click="markNotification('{{ $notification->id }}')" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">{{ $notification->created_at->format("M d, Y") }}</div>
                    <span class="{{ $notification->read_at ?: 'font-weight-bold' }}">{{ $notification->data['comment_text'] ?? '' }}</span>
                </div>
            </a>

            @empty

            @endforelse

           
            <!-- <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a> -->
        </div>
    </li>
</div>