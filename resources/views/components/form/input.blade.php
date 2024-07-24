<div class="form-group row">
    <label for="{{ $name }}" class="col-sm-3 col-form-label">{{ __($label) }}</label>
    <div class="col-sm-9">
        <input type="{{ $type ?? 'text' }}" class="form-control @error($name) is-invalid @enderror"
            id="{{ $name }}" name="{{ $name }}" value="{{ old($name) ?? $valueId }}">
        @error($name)
            <span class="text-danger text-small" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
