@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables/dataTable-select/css/select.bootstrap4.min.css') }}">
@endpush

<section class="section">
    <div class="section-header">
        <div {{ $attributes->merge(['class' => 'col-md-12 pl-1']) }}>
            <h1>{{ $title }}</h1>
        </div>
    </div>

    <div class="section-body">
        <x-alert/>
        <div class="card">
            <div class="card-header">
                <h4>{{ 'Daftar '.$title }}</h4>
                <div class="card-header-action">
                    <div>
                        <a href="{{ route($routeCreate) }}" class="btn btn-primary create-button"
                           style="border-radius: 0px !important">
                            {{ $buttonLabel }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    {{ $dataTable->table(['class' =>'table table-striped']) }}
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')

    <!-- Datatable -->
    <script src="{{ asset('assets/vendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables/dataTable.button.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables/dataTable.button.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables/dataTable-select/js/select.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>

    <script>
        $( ".create-button" ).click(function() {
            $('#loading').show();
        });
    </script>

    {{ $dataTable->scripts() }}
@endpush
