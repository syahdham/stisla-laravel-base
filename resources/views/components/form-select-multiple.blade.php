@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet" >
@endpush

<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ $label }}<span
            class="text-danger">{{ $required != '' ? '*' : '' }}</span></label>
    <div class="col-sm-12 col-md-5">
        <select class="form-control js-example-basic-multiple" multiple="multiple" name="{{ $name }}[]" {{ $required }}>
            <option value="">- Pilih {{ $label }} -</option>
            @if($selected)
                @foreach ($values as $value)
                    <option
                        value="{{ $value->id }}"
                    @foreach($selected as $select)
                        {{ $value->id == $select->id ? 'selected' : old($name) ? 'selected' :  '' }}
                        @endforeach
                    >
                        {{ $value->name }}
                    </option>
                @endforeach
            @else
                @foreach ($values as $value)
                    <option
                        value="{{ $value->id }}" {{ $value->id == $selected ? 'selected' : old($name) ? 'selected' :  '' }}>
                        {{ $value->name }}
                    </option>
                @endforeach
            @endif
        </select>
    </div>
    @error($name)
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

@push('scripts')
    <script src="{{ asset('assets/vendors/select2/dist/js/select2.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2({
                placeholder: {!! json_encode($placeholder) !!}
            });
        });
    </script>
@endpush
