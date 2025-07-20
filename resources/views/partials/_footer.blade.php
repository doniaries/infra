{{-- File: resources/views/partials/_footer.blade.php --}}
@livewireScripts

{{-- Library Scripts --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

{{-- Custom Scripts --}}
<script src="{{ asset('js/app.js') }}"></script> {{-- Script Global --}}
<script src="{{ asset('js/header-scripts.js') }}"></script> {{-- Script Khusus Header --}}

@stack('scripts') {{-- Slot untuk JS per halaman --}}
