<!DOCTYPE html>
<html>
@include('layouts.header')
<style>
    :root{
    --fonts:'Poppins', sans-serif;
    --base-color:#ebb700;
    --secondary-color:#1d1d1d;
    --nav-color:#dadada;
}
    .Proceed-To-Checkout{
        background-color: var(--base-color);
        border: 1px solid var(--base-color);
        width: 100%;
        color:white;
        cursor: pointer;
        padding-block: 7px;
        border-radius: 4px;
        display: flex;
        transition: 0.4s all;
        align-items: center;
        justify-content: center;
        outline: none;
        text-decoration: none;
    }
        .Proceed-To-Checkout:hover{
        color: white;
        border: 1px solid white;
        width: 100%;
        outline: none;
        text-decoration: none;
        background-color: var(--base-color);
        padding-block: 7px;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<body>
    <div class="card-body p-0">
         @livewire('cart')
    </div>
                      
  
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
@include('layouts.footer')
@livewireScripts
</body>
</html>