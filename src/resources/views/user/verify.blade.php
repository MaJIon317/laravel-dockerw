<div>
   
    <div class="alert alert--danger">{!! __('user.verify_text') !!}</div>

    <form wire:submit="updateLink">
        <button type="submit" class="btn">{{ __('user.verify_button') }}</button>
    </form>

</div>
