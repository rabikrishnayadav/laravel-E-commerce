<!DOCTYPE html>
<html lang="en">
	<head>
		<base href="/public">
		<!-- plugins:css -->
		@include('admin.css')
		<style type="text/css">
			label{
				display: inline-block;
				width: 150px;
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
					<form method="post" action="{{url('edit_product',$data->id)}}" enctype="multipart/form-data">
						@csrf
						<h1 class="font-weight-bold bg-info text-dark p-2">Update Product</h1>
						<div class="p-2">
							<label>Product Title</label>
							<input type="text" name="title" value="{{$data->title}}" placeholder="product title" class="bg-dark" required>
						</div>
						<div class="p-2">
							<label>Price</label>
							<input type="number" name="price" value="{{$data->price}}" placeholder="Product price" class="bg-dark" required>
						</div>
						<div class="p-2">
							<label>Description</label>
							<input type="text" name="desc" value="{{$data->description}}" placeholder="product Description" class="bg-dark" required>
						</div>
						<div class="p-2">
							<label>Quantity</label>
							<input type="text" name="quantity" value="{{$data->quantity}}" placeholder="product Quantity" class="bg-dark" required>
						</div>
						<div class="p-2">
							<label>Product Old Image</label>
							<img src="images/product_image/{{$data->image}}" style="width:150px; height:100px;"><br>
							<label>Upload New Image</label>
							<input type="file" name="product_image" class="bg-dark">
						</div>
						<div class="p-2">
							<input type="submit" name="submit" value="Submit" class="btn btn-success">
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- plugins:js -->
		@include('admin.script')
	</body>
</html>