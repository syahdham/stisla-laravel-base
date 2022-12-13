@extends('layouts.app')

@section('title', 'Tampilan')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/vendors/izitoast/dist/css/iziToast.min.css') }}">
@endpush

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Tampilan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Tampilan</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Tampilan</h2>
        <p class="section-lead">
            Konfigurasi <i>base template</i>
        </p>

        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-header justify-content-center text-uppercase" style="min-height: 0px; color: #34395e">
                        <strong>Primary</strong>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="base_primary_color">Base Color</label>
                            <input type="color" class="form-control" id="base_primary_color" name="base_primary_color" value="{{ $themes->where('type', 'base_primary_color')[0]['value'] ?? '#6777ef'}}">
                        </div>
                        <div class="form-group">
                            <label for="event_primary_color">Event Color</label>
                            <input type="color" class="form-control" id="event_primary_color" name="event_primary_color" value="{{ $themes->where('type', 'event_primary_color')[0]['value'] ?? '#394eea'}}">
                            <small>* Hover, focus, active</small>
                        </div>
                        <div class="form-group">
                            <label for="box_shadow_primary_color">Box Shadow Color</label>
                            <input type="color" class="form-control" id="box_shadow_primary_color" name="box_shadow_primary_color" value="{{ $themes->where('type', 'box_shadow_primary_color')[0]['value'] ?? '#acb5f6' }}">
                        </div>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-block" id="save-theme-color" data-theme-color="primary">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-header justify-content-center text-uppercase" style="min-height: 0px; color: #34395e">
                        <strong>Secondary</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="base_secondary_color">Base Color</label>
                            <input type="color" class="form-control" id="base_secondary_color" name="base_secondary_color" value="{{ $themes->where('type', 'base_secondary_color')[0]['value'] ?? '#cdd3d8'}}">
                        </div>
                        <div class="form-group">
                            <label for="event_secondary_color">Event Color</label>
                            <input type="color" class="form-control" id="event_secondary_color" name="event_secondary_color" value="{{ $themes->where('type', 'event_secondary_color')[0]['value'] ?? '#bfc6cd'}}">
                            <small>* Hover, focus, active</small>
                        </div>
                        <div class="form-group">
                            <label for="box_shadow_secondary_color">Box Shadow Color</label>
                            <input type="color" class="form-control" id="box_shadow_secondary_color" name="box_shadow_secondary_color" value="{{ $themes->where('type', 'box_shadow_secondary_color')[0]['value'] ?? '#e1e5e8' }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-secondary btn-block" id="save-theme-color" data-theme-color="secondary">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-header justify-content-center text-uppercase" style="min-height: 0px; color: #34395e">
                        <strong>Success</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="base_success_color">Base Color</label>
                            <input type="color" class="form-control" id="base_success_color" name="base_success_color" value="{{ $themes->where('type', 'base_success_color')[0]['value'] ?? '#47c363'}}">
                        </div>
                        <div class="form-group">
                            <label for="event_success_color">Event Color</label>
                            <input type="color" class="form-control" id="event_success_color" name="event_success_color" value="{{ $themes->where('type', 'event_success_color')[0]['value'] ?? '#3bb557'}}">
                            <small>* Hover, focus, active</small>
                        </div>
                        <div class="form-group">
                            <label for="box_shadow_success_color">Box Shadow Color</label>
                            <input type="color" class="form-control" id="box_shadow_success_color" name="box_shadow_success_color" value="{{ $themes->where('type', 'box_shadow_success_color')[0]['value'] ?? '#81d694' }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success btn-block" id="save-theme-color" data-theme-color="success">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-header justify-content-center text-uppercase" style="min-height: 0px; color: #34395e">
                        <strong>Info</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="base_info_color">Base Color</label>
                            <input type="color" class="form-control" id="base_info_color" name="base_info_color" value="{{ $themes->where('type', 'base_info_color')[0]['value'] ?? '#3abaf4'}}">
                        </div>
                        <div class="form-group">
                            <label for="event_info_color">Event Color</label>
                            <input type="color" class="form-control" id="event_info_color" name="event_info_color" value="{{ $themes->where('type', 'event_info_color')[0]['value'] ?? '#0da8ee'}}">
                            <small>* Hover, focus, active</small>
                        </div>
                        <div class="form-group">
                            <label for="box_shadow_info_color">Box Shadow Color</label>
                            <input type="color" class="form-control" id="box_shadow_info_color" name="box_shadow_info_color" value="{{ $themes->where('type', 'box_shadow_info_color')[0]['value'] ?? '#82d3f8' }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-info btn-block" id="save-theme-color" data-theme-color="info">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-header justify-content-center text-uppercase" style="min-height: 0px; color: #34395e">
                        <strong>Warning</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="base_warning_color">Base Color</label>
                            <input type="color" class="form-control" id="base_warning_color" name="base_warning_color" value="{{ $themes->where('type', 'base_warning_color')[0]['value'] ?? '#ffa426'}}">
                        </div>
                        <div class="form-group">
                            <label for="event_warning_color">Event Color</label>
                            <input type="color" class="form-control" id="event_warning_color" name="event_warning_color" value="{{ $themes->where('type', 'event_warning_color')[0]['value'] ?? '#ff990d'}}">
                            <small>* Hover, focus, active</small>
                        </div>
                        <div class="form-group">
                            <label for="box_shadow_warning_color">Box Shadow Color</label>
                            <input type="color" class="form-control" id="box_shadow_warning_color" name="box_shadow_warning_color" value="{{ $themes->where('type', 'box_shadow_warning_color')[0]['value'] ?? '#ffc473' }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-warning btn-block" id="save-theme-color" data-theme-color="warning">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-header justify-content-center text-uppercase" style="min-height: 0px; color: #34395e">
                        <strong>Danger</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="base_danger_color">Base Color</label>
                            <input type="color" class="form-control" id="base_danger_color" name="base_danger_color" value="{{ $themes->where('type', 'base_danger_color')[0]['value'] ?? '#fc544b'}}">
                        </div>
                        <div class="form-group">
                            <label for="event_danger_color">Event Color</label>
                            <input type="color" class="form-control" id="event_danger_color" name="event_danger_color" value="{{ $themes->where('type', 'event_danger_color')[0]['value'] ?? '#fb160a'}}">
                            <small>* Hover, focus, active</small>
                        </div>
                        <div class="form-group">
                            <label for="box_shadow_danger_color">Box Shadow Color</label>
                            <input type="color" class="form-control" id="box_shadow_danger_color" name="box_shadow_danger_color" value="{{ $themes->where('type', 'box_shadow_danger_color')[0]['value'] ?? '#fd9b96' }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-danger btn-block" id="save-theme-color" data-theme-color="danger">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-header justify-content-center text-uppercase" style="min-height: 0px; color: #34395e">
                        <strong>Light</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="base_light_color">Base Color</label>
                            <input type="color" class="form-control" id="base_light_color" name="base_light_color" value="{{ $themes->where('type', 'base_light_color')[0]['value'] ?? '#e3eaef'}}">
                        </div>
                        <div class="form-group">
                            <label for="event_light_color">Event Color</label>
                            <input type="color" class="form-control" id="event_light_color" name="event_light_color" value="{{ $themes->where('type', 'event_light_color')[0]['value'] ?? '#c3d2dc'}}">
                            <small>* Hover, focus, active</small>
                        </div>
                        <div class="form-group">
                            <label for="box_shadow_light_color">Box Shadow Color</label>
                            <input type="color" class="form-control" id="box_shadow_light_color" name="box_shadow_light_color" value="{{ $themes->where('type', 'box_shadow_light_color')[0]['value'] ?? '#e6ecf1' }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-light btn-block" id="save-theme-color" data-theme-color="light">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-header justify-content-center text-uppercase" style="min-height: 0px; color: #34395e">
                        <strong>Dark</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="base_dark_color">Base Color</label>
                            <input type="color" class="form-control" id="base_dark_color" name="base_dark_color" value="{{ $themes->where('type', 'base_dark_color')[0]['value'] ?? '#191d21'}}">
                        </div>
                        <div class="form-group">
                            <label for="event_dark_color">Event Color</label>
                            <input type="color" class="form-control" id="event_dark_color" name="event_dark_color" value="{{ $themes->where('type', 'event_dark_color')[0]['value'] ?? '#000000'}}">
                            <small>* Hover, focus, active</small>
                        </div>
                        <div class="form-group">
                            <label for="box_shadow_dark_color">Box Shadow Color</label>
                            <input type="color" class="form-control" id="box_shadow_dark_color" name="box_shadow_dark_color" value="{{ $themes->where('type', 'box_shadow_dark_color')[0]['value'] ?? '#728394' }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-dark btn-block" id="save-theme-color" data-theme-color="dark">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
    <script src="{{ asset('assets/vendors/izitoast/dist/js/iziToast.min.js') }}"></script>
    <script>

        [
            'primary', 'secondary', 'success', 'warning',
            'info', 'danger', 'light', 'dark'
        ].forEach(function (item) {
            let i_base = document.querySelector(`input[name="base_${item}_color"]`),
                i_event = document.querySelector(`input[name="event_${item}_color"]`),
                i_box_shadow = document.querySelector(`input[name="box_shadow_${item}_color"]`);

            i_base.addEventListener('change', function (e) {
                document.styleSheets[0].cssRules[0].style.setProperty(`--${item}`, this.value)
            })
            i_event.addEventListener('change', function (e) {
                document.styleSheets[0].cssRules[0].style.setProperty(`--${item}-event`, this.value)
            })
            i_box_shadow.addEventListener('change', function (e) {
                document.styleSheets[0].cssRules[0].style.setProperty(`--${item}-box-shadow`, this.value)
            })
        })

    </script>

    <script>
        $(function () {

            $(document).on('click', '#save-theme-color', function (e) {
                e.preventDefault()

                var theme = $(this).data('theme-color')

                $.each(document.querySelectorAll("#save-theme-color"), (k, v) => {
                    $(v).attr('disabled', true)
                })
                $.ajax({
                    url: '{{ url()->current() }}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'JSON',
                    method: 'POST',
                    data: {
                        theme,
                        base: $(`input[name="base_${theme}_color"]`).val(),
                        event: $(`input[name="event_${theme}_color"]`).val(),
                        box_shadow: $(`input[name="box_shadow_${theme}_color"]`).val()
                    },
                    success: (response) => {
                        if (response.success) {
                            iziToast.success({
                                title: 'Berhasil',
                                message: response.message,
                                position: 'topRight'
                            });
                        }
                        $.each(document.querySelectorAll("#save-theme-color"), (k, v) => {
                            $(v).removeAttr('disabled')
                        })
                    }
                })
            })
        })
    </script>
@endpush
