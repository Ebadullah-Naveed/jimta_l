@include('layouts.header')
                    <div class="card-body p-0">
                        @livewire('packages-controller')
                    </div>
                    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
 @if(Session::has('message'))
 toastr.options =
 {
     "closeButton" : true,
     "progressBar" : true
 }
         toastr.success("{{ session('message') }}");
 @endif

 @if(Session::has('error'))
 toastr.options =
 {
     "closeButton" : true,
     "progressBar" : true
 }
         toastr.error("{{ session('error') }}");
 @endif

 @if(Session::has('info'))
 toastr.options =
 {
     "closeButton" : true,
     "progressBar" : true
 }
         toastr.info("{{ session('info') }}");
 @endif

 @if(Session::has('warning'))
 toastr.options =
 {
     "closeButton" : true,
     "progressBar" : true
 }
         toastr.warning("{{ session('warning') }}");
 @endif
</script>

                    @include('layouts.footer')         
   
