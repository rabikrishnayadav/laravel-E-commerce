<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- plugins:css -->
		@include('admin.css')
		<style type="text/css">
			label{
				display: inline-block;
				width: 150px;
			}
			.table td img, .jsgrid .jsgrid-table td img {
			    width: 100px;
			    height: 100px;
			        border-radius: 5%;
			}
		</style>
	</head>
	<body>
	<div class="container-scroller">
	<!-- partial:partials/_sidebar.html -->
	@include('admin.sidebar')
	
	<!-- partial:partials/_navbar.html -->
	@include('admin.navbar')
	
	<!-- partial -->
	<div class="container-fluid page-body-wrapper">
		<div class="container pt-5" align="center">
			@if(session()->has('message'))
					<div class="alert alert-success">
						{{session()->get('message')}}
						<button type="button" class="close" data-dismiss="alert">X</button>
					</div>
					@endif
			<table class="table table-bordered table-hover table-striped table-responsive-sm text-center">
				<thead class="text-dark font-weight-bold">
					<tr>
						<th>Customer Name</th>
						<th>Phone</th>
						<th>Address</th>
						<th>Product Title</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody class="table-dark">
					@foreach($order as $data)
					<tr>
						<td>{{$data->name}}</td>
						<td>{{$data->phone}}</td>
						<td>{{$data->address}}</td>
						<td>{{$data->product_name}}</td>
						<td>{{$data->price}}</td>
						<td>{{$data->quantity}}</td>
						<td>{{$data->status}}</td>
						<td><a href="{{url('order-status',$data->id)}}" class="btn btn-success">Delivered</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div style="text-align:center">
				{{$order->links()}}
			</div>
		</div>
	</div>
</div>
	<!-- plugins:js -->
	@include('admin.script')
	</body>
</html>