<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    .content {
    padding: 78px 30px 30px 280px;
    min-height: calc(100vh - 70px);
}
</style>
    @livewireStyles
</head>
<body>
@include('layouts.back.header')
                    <div class="card-body p-0">
                        @livewire('withdraw-req')
                    </div>
                    @include('layouts.back.footer')       
    @livewireScripts
    <script type="text/javascript">
        window.livewire.on('userStore', () => {
            $('#exampleModal').modal('hide');
        });
    </script>
   <script>
       $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#blog-table .child-row").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

jQuery(document).ready(function($) {
   $('input.maxtickets_enable_cb').change(function(){
        if ($(this).is(':checked')) $('div.max_tickets').show();
        else $('div.max_tickets').hide();
    }).change();
});
   </script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        showCloseButton: true,
        timer: 5000,
        timerProgressBar:true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    window.addEventListener('alert',({detail:{type,message}})=>{
        Toast.fire({
            icon:type,
            title:message
        })
    })
</script> 
   
</body>
</html>