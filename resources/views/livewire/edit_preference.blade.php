<form wire:submit.prevent="update" method="POST">
    @csrf
    <h6 class="heading-small text-muted mb-4">{{ __('Edit number preference') }}</h6>
    <input type="hidden" wire:model="selected_id">
    <div class="pl-lg-4">
        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
            <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
            <input type="text" wire:model="name" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" autofocus>

             @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group{{ $errors->has('value') ? ' has-danger' : '' }}">
            <label class="form-control-label" for="input-value">{{ __('Value') }}</label>
            <input type="text" wire:model="value" name="value" id="input-value" class="form-control form-control-alternative{{ $errors->has('value') ? ' is-invalid' : '' }}" placeholder="{{ __('Value') }}" autofocus>

            @error('value')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success mt-4">{{ __('Update number preference') }}</button>
            <button type="button" wire:click="cancel()" class="btn btn-warning mt-4">{{ __('Cancel') }}</button>
        </div>
    </div>
</form>