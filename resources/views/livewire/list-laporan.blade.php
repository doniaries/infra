<div class="wrapper w-full md:max-w-5xl mx-auto pt-20 px">
   <h1 class="text-xl font-medium">Formulir Laporan</h1>
   {{ $this->table }}
   @push('scripts')
   <script>
    function onSubmit(token) {
      document.getElementById("LaporForm").submit();
    }
  </script>
   @endpush
</div>
