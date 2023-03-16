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
.package-level-pack{
    border:1px solid var(--nav-color);
    display: flex;
    color:white;
    background:var(--base-color);
    align-items:center;
    justify-content:center;
    padding-block:10px
}
.main-body-package{
    border-radius:0px;
    height:100%
}
.package-price{
    display:flex;
    align-items:center;
    justify-content:center;
}
.package-price h1{
    color:black;
}
.package-price span{
    color:#bdbdbd !important;
    font-weight:700
}
span{
    color:#bdbdbd !important;
    font-weight:700
}
.pakage-head-div{
    height:100%;
    width:33.3%;
    display:flex;
    align-items:center;
    justify-content:center;
    padding-block:40px;
}
.package-price{
    padding-block:0px !important;
}

.package-detail-bar{
    padding-block:20px;
    text-align:center;
}
.package-detail-bar2{
    border-top: 1px solid var(--nav-color);
    display: flex;
    align-items: center;
    justify-content: start;
    flex-direction: column;
    padding-block: 20px !important;
    height: 220px;
    text-align: center;
}
.package-detail-bar2 p{
    font-size:12px !important;
    margin-bottom:4px !important;
}
.package-detail-buy1{
    border-top: 1px solid var(--nav-color);
    padding-inline:10px;
    display:flex;
    align-items:center;
    justify-content:center;
    padding-block:10px;
}
.package-detail-buy1 button:hover{
    display:flex;
    align-items:center;
    justify-content:center;
    width:100%;
    background:var(--base-color);
    padding-block:6px;
    color:white;
    border-radius:20px;
}
.package-detail-buy1 button{
    display:flex;
    align-items:center;
    background:white;
    justify-content:center;
    transition:0.4s all;
    width:100%;
    border:1px solid var(--base-color);
    padding-block:6px;
    color:var(--base-color);
    border-radius:20px;
}

.login-inputs{
    border:1px solid #f8fafc;
    border-radius:10px;
    padding-inline:15px !important;
    width:100%;
    background-color:white !important;
    height:45px !important;
    outline:none !important;
    transition:0.6s all;
    box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;
}
.login-inputs:focus{
    border:1px solid var(--base-color) !important;
}

</style>
<body>
                    <div class="card-body p-0">
                        @livewire('subscriber-controller')
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