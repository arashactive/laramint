<div>
    <div class="row">
        <div class="col-12 mb-2">
            <div class="card border-left-primary bg-light shadow">
                <div class="card-body p-4 text-left">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-4">
                            <div class="row">
                                <div class="col-2">
                                    <img src="{{ URL::to('term/' . $term->image) }}" class="img-fluid" alt="">
                                </div>
                                <div class="col ml-3 align-middle">
                                        <h6 class="text-secondary fs-5">
                                            {{ $term->Department->title }} | {{ $term->Course->title }}
                                        </h6>
                                        <div class="text-lg pt-2 font-weight-bold mb-1 text-primary">
                                            <a href="{{ route('learningCourse', $term->id) }}">
                                                {{  $term->title }}    
                                            </a>
                                        </div>

                                        {{ $slot }}
                                        
                                        <div class="mt-3">
                                            <div class="progress" style="height: 15px;">
                                                @php($rand = rand(20, 95))
                                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{$rand}}%;" aria-valuenow="{{ $rand }}" aria-valuemin="0" aria-valuemax="100">{{$rand}}%</div>
                                            </div>
                                        </div>

                                </div>

                                <div class="col-4">
                                    <h6 class="font-weight-bold text-dark">{{ __('Next Up') }}</h6>
                                    <p class="text-dark">
                                        <i class="fa fa-flag-checkered"></i>
                                        <a href="" class="">Former Project Goals</a>
                                    </p>
                                    <small class="text-secondary">week 2 | Discussion Promot * 10 min</small>

                                </div>
                            </div>                            
                            
                        </div>
                        
                    </div>
    
                </div>
            </div>
        </div>
    </div>
</div>