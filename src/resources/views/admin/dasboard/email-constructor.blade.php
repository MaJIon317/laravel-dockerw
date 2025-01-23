<div>
   
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>
                <i class="fa-regular fa-envelope"></i>
                Почтовая рассылка
            </span>

            @if ($emailConstructors->count())
                <select wire:model.change="email_constuctor" class="form-select">
                    @foreach ($emailConstructors as $element)
                        <option value="{{ $element->id }}" @if($emailConstructor == $element) selected @endif>{{ $element->name }}</option>
                    @endforeach
                </select>
            @endif

        </div>
        <div class="card-body">
            @if ($emailConstructor)
                <div class="row">
                    <div class="col col-sm-8">
                        <livewire:admin.email-constructor-stats key="{{ now() }}" :$emailConstructor />
                    </div>
            
                    <div class="col col-sm-4">
                        <livewire:admin.email-constructor-click-map key="{{ now() }}" :$emailConstructor />
                    </div>
                </div>
            @else
                <div class="alert alert-info">{{ __('Couldn\'t find the data') }}</div>
            @endif
        </div>
    </div>

</div>
