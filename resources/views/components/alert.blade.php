@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/izitoast/dist/css/iziToast.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/vendors/izitoast/dist/js/iziToast.min.js') }}"></script>
    <script>
        $(document).ready( function() {
            if("{!! \Session::has('success') !!}") {
                iziToast.success({
                    title: 'Hello, ' + "{!! auth()->user()->name !!}",
                    message: "{!! \Session::get('success') !!}",
                    position: 'topRight'
                });
            } else if("{!! \Session::has('error') !!}") {
                iziToast.error({
                    title: 'Hello, ' + "{!! auth()->user()->name !!}",
                    message: "{!! \Session::get('error') !!}",
                    position: 'topRight'
                });
            } else {
                return null;
            }

            $('#loading').hide();

        });
    </script>
@endpush
