<!DOCTYPE html>
<html lang="en">
  <head>
    @include('user.css')
  </head>
  <body>
    <!-- Header -->
    @include('user.header')
    <!-- Page Content -->
    <div class="pb-5"></div>
    <div class="container pt-5" style="padding-top:100px;">
      @if(session()->has('message'))
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{session()->get('message')}}
      </div>
      @endif
      <table class="table table-bordered table-hover table-striped table-responsive-sm text-center">
        <thead class="bg-secondary text-light">
          <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cart as $data)
          <tr>
            <td>{{$data->product_title}}</td>
            <td>{{$data->quantity}}</td>
            <td>{{$data->price}}</td>
            <td><a href="{{url('delete-cart-item',$data->id)}}" class="btn btn-danger">Cancel</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
    
    
    @include('user.script')
  </body>
</html>