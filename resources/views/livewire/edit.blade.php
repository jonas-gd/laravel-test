<form wire:submit.prevent="update" method="POST">
    @csrf
    <h6 class="heading-small text-muted mb-4">{{ __('Edit number') }}</h6>
    <input type="hidden" wire:model="selected_id">
    <div class="pl-lg-4">
        <div class="form-group{{ $errors->has('number') ? ' has-danger' : '' }}">
            <label class="form-control-label" for="input-number">{{ __('Number') }}</label>
            <input type="number" wire:model="number" name="number" id="input-number" class="form-control form-control-alternative{{ $errors->has('number') ? ' is-invalid' : '' }}" placeholder="{{ __('Number (8 to 14 characters required
)') }}" required autofocus>
             @error('number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
            <label class="form-control-label" for="input-status">{{ __('Status') }}</label>
            <select wire:model="status" name="status" id="input-status" required class="form-control">
                <option value="active" selected="selected">Active</option>
                <option value="inactive">Inactive</option>
                <option value="cancelled">Cancelled</option>
            </select>
            @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success mt-4">{{ __('Update') }}</button>
            <button type="button" wire:click="cancel()" class="btn btn-warning mt-4">{{ __('Cancel') }}</button>
        </div>
    </div>
</form>