<div>
  <style>
    .form-group label{
      color:white !important;
    }
    .form-group {

    }
  </style>
<div class="content">
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Jimta Wallet</h5>
                <h3 class="card-title"><i class="fa fa-credit-card" aria-hidden="true"></i>{{App\Models\Wallet::where('user_id',auth()->user()->id)->value('amount')}}</h3>
                <a class="text-light" href="/dashboard/walletwithdraw">Withdraw</a>
                <p>USDT or BTC account only with 5% fee</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Jimta Coin</h5>
                <h3 class="card-title"><img class="m-3" height="30px" width="30px" src="{{asset('assets/images/Jimta-Coin.png')}}">{{App\Models\JimtaCoins::where('user_id',auth()->user()->id)->value('balance')}}</h3>
              </div>
            </div>
          </div>
          @if(auth()->user()->is_service_center == 1)
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
               
                <h5 class="card-category">Bonus</h5>
                {{$bonus_am = App\Models\ServiceCenterBonus::where('user_id',auth()->user()->id)->value('amount')}}
                @if($bonus_am == null)
                <h3 class="card-title"><i class="tim-icons icon-delivery-fast text-info"></i>0</h3>
                @else
                <h3 class="card-title"><i class="tim-icons icon-delivery-fast text-info"></i>{{$bonus_am}}</h3>
                @endif
               
              </div>
            </div>
          </div>
          @endif
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Completed Delivery</h5>
                <h3 class="card-title"><i class="fa fa-archive" aria-hidden="true"></i>0</h3>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Referal link</h5>
                <p class="card-title"><i class="fa fa-globe" aria-hidden="true"></i>https://jimta.org/user/referal/{{auth()->user()->id}}</p>
              </div>
            </div>
          </div>
          @if(auth()->user()->is_admin == 1)
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Investment Return %</h5>
                <div class="d-flex">
                <h3 class="card-title"><i class="fa fa-credit-card" aria-hidden="true"></i>{{App\Models\ReturnPersentage::where('id',1)->value('persentage')}}</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Change
                </button> 
                </div>
              </div>
            </div>
          </div>
          @endif
          @if(auth()->user()->is_service_center == 1)
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Total Orders</h5>
                <div class="d-flex">
                <h3 class="card-title"><i class="fa fa-credit-card" aria-hidden="true"></i>{{$totalOrder}}</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Total Orders</h5>
                <div class="d-flex">
                <h3 class="card-title"><i class="fa fa-credit-card" aria-hidden="true"></i>{{$total}}</h3>
                </div>
              </div>
            </div>
          </div>
          @endif
          <!-- @if(auth()->user()->is_investor == 1 && $inv != null)
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Return On Investment Till Date</h5>
                <h3 class="card-title"><i class="fa fa-credit-card" aria-hidden="true"></i>{{$this->roi}}</h3>
                <p>You can only get return after investment is muture</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Invested Amount</h5>
                <h3 class="card-title"><i class="fa fa-credit-card" aria-hidden="true"></i>{{$inv['investment_amount']}}</h3>
                <p>You can only get return after investment is muture</p>
              </div>
            </div>
          </div>
          @endif -->
          @if(auth()->user()->is_admin == 1)
          <div class="col-lg-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Investor/Non-Investor</h5>
              </div>
              <div id="main"></div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Most Invested Packages</h5>
              </div>
              <div id="secondary"></div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Sales</h5>
              </div>
              <div id="sales"></div>
            </div>
          </div>
          @endif
          <!-- <div class="col-lg-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Notification</h5>
              </div>
              <div>
                @foreach(\App\Models\Notification::where('user_id',null)->orWhere('user_id',auth()->user()->id)->latest()->get() as $notification)
                <p>{{$notification->message}}</p>
                <p>{{$notification->created_at}}</p>
                <hr>
                @endforeach
              </div>
            </div>
          </div> -->
        </div>
      </div>
      <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="input-group flex-column mb-3">
                    <label>Persentage</label>
                    <input style="width: 84%;margin-left: 0px;border-left: 1px solid;" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" wire:model="persentage">
                </div>  
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save changes</button>
              </form>          
            </div>
            <div class="modal-footer">
             
            </div>
          </div>
        </div>
    </div>
          <script type="text/javascript">
            // Initialize the echarts instance based on the prepared dom
                  // based ready dom, initialize echarts instance 
          var myChart = echarts.init(document.getElementById('main'));

      // Specify configurations and data graphs 
      var option = {
      tooltip : {
      trigger: 'item',
      formatter: "{a} <br/>{b} : {c} ({d}%)"
      },
      legend: {
              orient: 'vertical',
              left: 'left',
              data: ['Investor','Non Investor'],
              color: '#fff',
              textStyle:
              {
                'color':'#fff'
              }
          },
    
      series : [
      {
          name: 'Access Sources',
          type: 'pie',
          radius : '35%',
          // center: ['50%', '60%'],
          data:[
              {value:{{$investor_count}}, name:'Investor'},
              {value:{{$non_investor_count}}, name:'Non Investor'},
          ],
        
      }
      ]
      };

      // Use just the specified configurations and data charts. 
      myChart.setOption(option);


      var myChart = echarts.init(document.getElementById('secondary'));

              // Specify configurations and data graphs 
              var option = {
              tooltip : {
              trigger: 'item',
              formatter: "{a} <br/>{b} : {c} ({d}%)"
              },
              legend: {
                      orient: 'vertical',
                      left: 'left',
                      data: ['250$ Package','500$ Package','1000$ Package','5000$ Package'],
                      color: '#fff',
                      textStyle:
                      {
                        'color':'#fff'
                      }
                  },

              series : [
              {
                  name: 'Access Sources',
                  type: 'pie',
                  radius : '35%',
                  // center: ['50%', '60%'],
                  data:[
                      {value:{{$package_250_count}}, name:'250$ Package'},
                      {value:{{$package_500_count}}, name:'500$ Package'},
                      {value:{{$package_1000_count}}, name:'1000$ Package'},
                      {value:{{$package_5000_count}}, name:'5000$ Package'},
                  ],
                  itemStyle: {
                      emphasis: {
                          shadowBlur: 0,
                          shadowOffsetX: 0,
                          shadowColor: 'rgba(0, 0, 0, 0)'
                          
                      }
                  }
              }
              ]
              };

              // Use just the specified configurations and data charts. 
              myChart.setOption(option);

              var chartDom = document.getElementById('sales');
              var myChart = echarts.init(chartDom);
              var option;

              option = {
                xAxis: {
                  type: 'category',
                  data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July','Aug','Sep','Oct','Nov','Dec']
                },
                yAxis: {
                  type: 'value'
                },
                series: [
                  {
                    data: [120, 200, 150, 80, 70, 110, 130,100,100,100,100,100],
                    type: 'bar',
                    showBackground: true,
                    backgroundStyle: {
                      color: 'rgba(180, 180, 180, 0.2)'
                    }
                  }
                ]
              };

              myChart.setOption(option);


          </script>

</div>