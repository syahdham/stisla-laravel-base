<div class="form-group">
    <label for={{ $label }}>{{ $label }}</label>
    <input
        id="{{ $name }}"
        type="{{ $type }}"
        class="form-control @error($name) is-invalid @enderror"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        tabindex="1"
        value="{{ $value ?? old($name) }}"
    >
    @error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

