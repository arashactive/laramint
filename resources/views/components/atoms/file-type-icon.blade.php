<button class="btn btn-light btn-sm " data-toggle="tooltip" data-placement="top" title="{{ $fileType }}">
    @if(in_array($fileType, ['mp4']))
    <i class="fa fa-video text-success"></i>
    @elseif($fileType == 'pdf')
    <i class="fa fa-file-pdf text-success"></i>
    @elseif(in_array($fileType, ['jpg', 'jpeg', 'gif', 'png']))
    <i class="fa fa-image text-success"></i>
    @elseif(in_array($fileType, ['mp3', 'wav', 'avi']))
    <i class="fa fa-file-audio text-success"></i>
    @else
    {{ $fileType }}
    @endif
</button>