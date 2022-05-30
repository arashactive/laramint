<div>

    @if($fileType == 'image')

    @if($preview)
    <img src="{{ asset('storage/'. $file) }}" class="img-fluid">
    @else
    <div class="btn btn-circle btn-primary btn-sm text-white">
        <i class="fas fa-images"></i>
    </div>
    @endif

    @endif


    @if($fileType == 'video')

    @if($preview)
    <img src="{{ asset('storage/'. $file) }}" class="img-fluid">
    @else
    <i class="fas fa-file-image fa-5x"></i>
    @endif

    @endif


    @if($fileType == 'audio')

    @if($preview)
    <img src="{{ asset('storage/'. $file) }}" class="img-fluid">
    @else
    <i class="fas fa-file-image fa-5x"></i>
    @endif

    @endif


    @if($fileType == 'file')
    <div class="btn btn-circle btn-info btn-sm text-white">
    <i class="fa fa-file"></i>
    </div>

    @endif

</div>