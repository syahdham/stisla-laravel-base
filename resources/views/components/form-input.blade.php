<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ $label }}
        <span class="text-danger">{{ $required ? '*' : '' }}</span>
    </label>
    <div class="col-sm-12 col-md-5">
        <input
            type="{{ $type }}"
            name="{{ $name }}"
            value="{{ $value ?? old($name) }}"
            class="form-control {{ $attributes->get('class') }} @error($name) is-invalid @enderror" {{ $required ?? '' }} {{ $disabled }}
            placeholder="{{ $placeholder }}"
        >
        @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
