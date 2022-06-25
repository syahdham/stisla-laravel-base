@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/filepond/filepond.css') }}">
@endpush

<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ $label }}
        <span class="text-danger">{{ $required ? '*' : '' }}</span>
    </label>
    <div class="col-sm-12 col-md-5">
        <input type="file" name="{{ $name }}" id="{{ $name }}" required/>
        @error($name)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

@push('scripts')

    <script src="{{ asset('assets/vendors/filepond/filepond.js') }}"></script>

    <script>
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[id="image_file"]');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement);

        FilePond.setOptions({
            server: {
                url: '/file_upload',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });
    </script>
@endpush
