<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ url()->previous() }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <div {{ $attributes->merge(['class' => 'col-md-12 pl-1']) }}>
            <h1>{{ $title }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $page == 'create' ? 'Tambah' : 'Ubah' }} {{ $title }}</h4>
                    <div class="card-header-action">
                        @if ($needButtonSave)
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button type="submit" form="form_id" id="submitButton" class="btn btn-primary"
                                            style="border-radius: 0px !important;padding: .3rem .8rem">
                                        {{ $buttonLabel }}</button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')

    <script>
        $( "#submitButton" ).click(function() {
            let invalidInput = $('input:invalid');
            let invalidSelect = $('select:invalid');

            if(invalidInput.length === 0 && invalidSelect.length === 0) {
                $('#loading').show();
            }
        });
    </script>

@endpush
