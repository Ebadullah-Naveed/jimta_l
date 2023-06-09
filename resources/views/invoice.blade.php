<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sales Invoice</title>
    <style>
      .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{asset('assets/images/Jimta-LOgo.png')}}">
      </div>
      <h1>INVOICE #{{$order->id}}</h1>
      <div id="company" class="clearfix">
        <div>Company Name</div>
        <div>Jimta Group International</div>
      </div>
      <div id="project">
        <div><span>CLIENT</span> {{$order->user->first_name}} {{$order->user->last_name}}</div>
        <div><span>ADDRESS</span> {{$order->user->address}}</div>
        <div><span>EMAIL</span> <a href="{{$order->user->email}}">{{$order->user->email}}</a></div>
        <div><span>Status</span> Paid</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">#</th>
            <th class="desc">Product Name</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          @foreach($order->orderItem as $key => $items)
          <tr>
            <td class="service">{{$key+1}}</td>
            <td class="desc">{{\App\Models\Product::where('id',$items->product_id)->value('title')}}</td>
            <td class="unit">{{$items->quantity}}</td>
            <td class="qty">{{\App\Models\Product::where('id',$items->product_id)->value('price')}}</td>
            <td class="total">{{\App\Models\Product::where('id',$items->product_id)->value('price') * $items->quantity}}</td>
          </tr>
        @endforeach
          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">${{$order->total}}</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">${{$order->total}}</td>
          </tr>
        </tbody>
      </table>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>