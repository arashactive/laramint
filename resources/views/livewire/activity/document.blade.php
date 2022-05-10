<div>
    <div class="process-wrap">

        <div class="row p-4 d-flex justify-content-center">

            @forelse ($activity->Files as $file)

            <div class="col-1 ">
                <div class="process-step-cont">
                    <button wire:click="showFile('{{ $file->id }}')" class="btn btn-circle btn-info btn-sm  step-{{ $loop->iteration }}">
                        <span class="text-sm">{{ $loop->iteration }}</span>
                    </button>
                </div>
            </div>


            @empty
            @endforelse


        </div>
        <hr />
        <div class="row">
            <div class="col-12 p-4 text-center">
                {!! $fileRender !!}
            </div>
        </div>
    </div>



</div>