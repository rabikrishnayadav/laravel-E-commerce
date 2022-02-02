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
						<th>Title</th>
						<th>Description</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Image</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody class="table-dark">
					@foreach($data as $product)
					<tr>
						<td>{{$product->title}}</td>
						<td>{{$product->description}}</td>
						<td>{{$product->price}}</td>
						<td>{{$product->quantity}}</td>
						<td><a href="images/product_image/{{$product->image}}"><img src="images/product_image/{{$product->image}}"></a></td>
						<td><a href="{{url('update_product',$product->id)}}" class="btn btn-primary">Update</a></td>
						<td><a href="{{url('delete_product',$product->id)}}" class="btn btn-danger">Delete</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div style="text-align:center">
				{{$data->links()}}
			</div>
		</div>
	</div>
</div>
	<!-- plugins:js -->
	@include('admin.script')
	</body>
</html>