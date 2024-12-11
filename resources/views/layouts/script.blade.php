<!-- JavaScript AOS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init(); // Initialize AOS
</script>

{{-- Jquery --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

{{-- Toastr JS  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

{{-- Sweet Alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Flowbit --}}
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>


{{-- Flash Message --}}
@if ($message = Session::get('success'))
    <script>
        Swal.fire('{{ $message }}', '', 'success')
    </script>
@endif

{{-- Toast success --}}
@if ($message = Session::get('success'))
    <script>
        toastr.success('{{ $message }}')
    </script>
@endif

{{-- Toast error --}}
@if ($message = Session::get('error'))
    <script>
        toastr.error('{{ $message }}')
    </script>
@endif
