<!DOCTYPE html>
<html>
@include('layouts.subs-header')
<style>
    :root{
        --fonts:'Poppins', sans-serif;
        --base-color:#ebb700;
        --secondary-color:#1d1d1d;
        --nav-color:#dadada;
    }


    .login_button_on_form{
        padding-inline: 10px;
        padding-block: 5px;
        border: none;
        background: var(--base-color);
        border-radius: 5px;
        color:white;
    }
    .forget_password{
        color:var(--base-color)
    }
    a:hover{
        color:var(--base-color) !important;
        text-decoration:none;
    }
    .custom_text{
        border:1px solid var(--nav-color);
        padding-inline:7px;
        padding-block:4px;
        border-radius:4px;
        width:100%;
    }
    .custom_text:focus{
        border:1px solid red !important;
        padding-inline:7px;
        padding-block:4px;
        border-radius:4px;
        box-shadow: 1px 1px 8px 1px #ffe082;
    }
    .custom_text:hover{
        cursor:pointer;
    }
    .top_heading_if_require{
        color:var(--base-color);
        margin:0px;
        font-weight:700;
    }   
</style>
<body>
    <div class="card-body p-0">
         @livewire('service-register')
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