<form wire:submit.prevent="store" method="POST">
    @csrf
    <h6 class="heading-small text-muted mb-4">{{ __('Add new number') }}</h6>

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

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
                <option value="">--- Select one option ---</option>
                <option value="active">Active</option>
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
            <button type="submit" class="btn btn-success mt-4">{{ __('Add') }}</button>
        </div>
    </div>
</form>