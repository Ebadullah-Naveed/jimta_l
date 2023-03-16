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
    .how-mem{
        color:var(--base-color);
    }
    .PV_OL ol li{
        position:relative;
    }
    .PV_OL ol li::before{
        content:"";
        height:10px;
        width:10px;
        background:var(--base-color);
        position:absolute;
        left:-15px;
        border-radius:50%;
        top:15px;
    }
</style>
<body>
    <div class="card-body p-0">
        <div>
<style>
.main-login-button{
    background:var(--base-color);
    color:white;
    padding-inline:30px !important;
    border-radius:10px;
    border:none;
    padding-block:8px;
    box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 48px;
} 
.jimta-coin-head{
    color:var(--base-color);
}
</style>
<div class="user-welcome container-fluid">
        <div class="container">
            <div class="row py-5 d-flex-column align-items-center justify-content-center flex-column complusory-header-inner-page">
                <h1>Jimta Rewards</h1>
            </div>
        </div>
</div>
<div class="container py-5">
    <div class="row  py-5 align-items-center justify-content-center">
        <p class="pb-5 px-3" >LEADERSHIP AWARDS This is where Distinguished Leaders are recognized and rewarded for their hard work and success in building an effective team. This is a one-time reward based on JVG Purchase Volume Jimta and JVP Personal Volume Jimta. Winners are rewarded with state-of-the-art gifts and exotic vacations to prime locations around the world, cars and more. These awards are given monthly or at corporate events around the world.</p>
        <p class="pb-5 px-3" >JIMTA Rewards Opportunity Think that's EVERYTHING? Not yet!!!JIMTA also rewards top leaders based on the number of purchases they have created. JV= Jimta volume, Enjoy Smartphone, travel Dubai, TANZANIA, Nigeria, Ivory Coast, Car, Home etc. Everything is possible, you just have to put in a little more effort and bet on the long term. It's just awesome!!!! As you can see, the 1-day trading income is not much compared to that of the various bonuses offered by the JIMTA company.</p>
        

        <div style="border:1px solid black;border-radius:5px" class="col-lg-5 ml-3 col-12 p-0 d-flex align-items-center justify-content-center flex-column p-5">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                <h1 class="jimta-coin-head">Jimta Peronal Volume (JVP)</h1>
                    <hr>
                <h2 style="font-weight:800;font-size:4rem">{{App\Models\PvWalletTrip::where('user_id',auth()->user()->id)->value('balance')}}</h2>
                </div>
                
            </div>
        </div>

        
        <div style="border:1px solid black;border-radius:5px" class="col-lg-5 ml-3 col-12 p-0 d-flex align-items-center justify-content-center flex-column p-5">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <h1 class="jimta-coin-head">Jimta Volume Group (JVG)</h1>
                    <hr>
                <h2 style="font-weight:800;font-size:4rem">{{App\Models\PvWallet::where('user_id',auth()->user()->id)->value('balance')}}</h2>
                </div>
                
            </div>
        </div>


        

</div>
<div class="PV_OL px-3">
        <ol>
            <li style="font-size:1.5rem">2400 Purchase JVG & 1000 Personal JVP = iPhone ($500 value)</li>
            <li style="font-size:1.5rem">40,000 Purchase JVG & 2400 Personal JVP = Dubai trip ($2000 value)</li>
            <li style="font-size:1.5rem">160,000 Purchase JVG & 3000 Personal JVP = 1 Car 1 trip to Dubai ($10,000 value)
</li>
            <li style="font-size:1.5rem">380,000 purchase JVG & 4000 personal JVP = 1 car 1 trip to Dubai and 01 trip to Africa ($30,000 value)
</li>
            <li style="font-size:1.5rem">1.000.000 JVG purchases & 5000 personal JVP = 1 Car 1 trip to Dubai 01 trip Africa 01 House ($100.000 value)</li>
</ol>
        </div>
</div>
</div>
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
</body>
</html>