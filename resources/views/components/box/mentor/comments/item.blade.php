<div>
    <div class="row">
        <div class="col-12 mb-2">
            <div class="card border-left-{{ $comment->confirm ? 'primary' : 'secondary' }} bg-light shadow">
                <div class="card-body p-2 text-left">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                {{ Str::words($comment->body, 3) }}
                            </div>
                            {{ $slot }}
                        </div>
                        <div class="col-auto">
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                                    <div class="dropdown-header">{{ __('Actions') }}:</div>
                                    <a class="dropdown-item" data-toggle="modal"  data-target="#comment{{ $comment->id }}">
                                    <i class="fa fa-info pr-2"></i> @lang('Show Comment')
                                    </a>
                                   
                                    @can('mentor.list')
                                    <div class="dropdown-divider"></div>
                                    <x-DeleteButton itemId="{{ $comment->id }}" path="mentor-comments.destroy" />
                                    @endcan

                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="comment{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Comment {{ $comment->Mentor->name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <span>{{ __('Mentor: ') }}</span>
                                                    <span>{{ $comment->Mentor->name }}</span>
                                                </div>
                                                <div class="col-6">
                                                    <span>{{ __('date: ') }}</span>
                                                    <span>{{ $comment->created_at }}</span>
                                                </div>
                                            </div>
                                            <p>
                                                {!! $comment->body !!}
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>