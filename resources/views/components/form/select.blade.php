<div class="mb-4 row">
    <label for="{{ $name }}" class="col-sm-3 col-form-label">{{ $label }}</label>
    <div class="col-sm-9">
        <select class="form-select js-example-basic-single" name="{{ $name }}">
            {{ $slot }}
            {{-- <option value="2">Two</option> --}}
        </select>
    </div>

</div>
