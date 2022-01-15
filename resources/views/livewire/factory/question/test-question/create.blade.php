<div class="col-12 text-left mt-4 p-4">

    <div class="card shadow p-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">question test:</h6>
        </div>
        <div class="card-body">
            
            <input type="hidden" wire:model="questionTypeId" />
            <div class="form-group">
                <label for="titleofquestion">title of question</label>
                <input type="text" class="form-control" id="titleofquestion" wire:model="title">
            </div>
            <div class="form-group">
                <label for="descriptionofquestion">description of question</label>
                <textarea class="form-control" id="descriptionofquestion" wire:model="question_body"></textarea>
            </div>
            @forelse($answers as $index => $answer)
            <div class="form-group">
            <label for="answer{{ $index }}">answer {{ $loop->iteration }}</label>
            <div class="row">
                <div class="col-11">
                    <input name="correctAnswer" value="{{ $index }}" wire:model="correctAnswer" class="form-check-input" type="radio">
                    <input type="text" class="form-control" id="answer{{ $index }}" wire:model="answers.{{ $index }}">
                </div>
                <div class="col-1">
                    <button class="btn btn-sm btn-danger btn-circle" wire:click.prevent="removeAnswer('{{ $index }}')"><i class="fa fa-times"></i></button>
                </div>
            </div>
            </div>
            @empty 
            @endforelse
            
            

            <button wire:click.prevent="addNewAnswer" class="btn btn-success btn-icon-split float-right">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
            </button>
            
            </form>

        </div>
        <div class="card-footer">
            <button wire:click.prevent="store" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Save</span>
            </button>
        </div>
    </div>
    <form>
    


    @include('livewire.factory.question.test-question.review')
</div>