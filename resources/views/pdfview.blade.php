<!DOCTYPE html>
<html>
<head>
</head>
<body>

<style type="text/css">


table, td, th, tr{
	border:1px solid black;
	border-collapse: collapse;
	padding: 10px;
}

.container {
	border: 1px solid black;
	padding: 15px; 
}
.text-center{
	text-align: center;
}
h2{
	margin-bottom: 0 !important;
	padding-bottom: 0 !important;
}
h6{
    font-size: 15px;
    font-weight: 400;
    line-height: 20px;
    margin: 0px;
}
.sec1-hedar{
	font-weight: 600;
	text-transform: capitalize;
	color: red;
}
p.paragraph{
	letter-spacing: 1px;
	font-size: 15px;
	font-weight: 400;
}
.sec3-title h2{
	text-decoration: underline;
}
.sec3-bill-detail{
	letter-spacing: 1px;
	line-height: 20px;
	font-weight: 400;
	font-size: 15px;
	width: 50%;
	    height: 100%;
	float: left;
}
.sec3-bill-price
{
	    float: left;
}

.sec3.order-amount{ 
	text-align: left;
	letter-spacing: 1px;
}

</style>
@foreach ($pay as $key => $pays)
<div class="container">
	<div class="pdf-section1">
		<p style="text-align:center;"><img src="http://www.ponnumaapillai.com/image/pmplogo.png" wdith="100" height="100"></p>
		<h3 class="sec1-hedar">Dear {{ $pays->billing_name }},</h3>
		<p class="paragraph"> &nbsp; &nbsp; &nbsp; Thank you for your order from www.poonumaapillai.com</p>
		<p class="paragraph"> &nbsp; &nbsp; &nbsp; Payment Status <span style="font-size: 25px;font-weight: bold;">{{ $pays->order_status }}</span></p>
	</div>	

	<div class="pdf-section2">	
		<div class="sec2 table">
			<table class="text-center">
				<tr>
					<th>PMP ID</th>
					<th>order_id</th>
					<th>tracking_id</th>
					<th>payment_mode</th>
					<th>trans_date</th>
					<th>GSTIN No.</th>
				</tr>
					
				<tr>
					<td>{{ $pays->user_id }}</td>
					<td>{{ $pays->order_id }}</td>
					<td>{{ $pays->tracking_id }}</td>
					<td>{{ $pays->payment_mode }}</td>
					<td>{{ $pays->trans_date }}</td>
					<td>33ALOPR7902H1ZT</td>
				</tr>
				
			</table>
		</div>
	</div>

	<div class="pdf-section3" style="display: flex;height: 200px;">
				<div class="sec3-bill-detail" style="width:50%;">
					<h2 class="sec3-title">Billing Details:</h2>
					<h6 class="bill-title">Customer Name : {{ $pays->billing_name }} </h6>
					<h6 class="bill-title">Email Id : {{ $pays->billing_email }} </h6>
					<h6 class="bill-title">Mobile No: {{ $pays->billing_tel }} </h6>
					<h6 class="bill-title address">Address  : {{ $pays->billing_address }} </h6>
					<h6 class="bill-title">Order Id : {{ $pays->order_id }}</h6>
					<h6 class="bill-title">Order Date: {{ $pays->trans_date }}</h6>
					<h6 class="bill-title">Bank Ref No: {{ $pays->bank_ref_no }}</h6>
				</div>	

				<div class="sec3-bill-price" style="width:50%;">
					<h2 class="price-title">Order Amount Details:</h2>
					<div class="sec3 order-amount">
						<h4 class="order-amount">Order Amount: INR 600.00</h4>
						<h4 class="order-amount">Net Payable: INR 600.00</h4>
					</div>	
				</div>
				
	</div>
	<br>
	<hr>
<div class="pdf-section4">
	<div class="sec4 customer-care">
		<h3>CUSTOMER CARE:</h3>
		<h6>http://www.ponnumaapillai.com</h6>
		<h6>Email : pearlsugarconsultants@gmail.com</h6>
		<h6>Contact Info : 77751-9600577751</h6>
	</div>	
</div>
		
</div>	

@endforeach
</body>
</html>
