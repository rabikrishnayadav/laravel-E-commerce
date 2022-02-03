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
        <form method="post" action="{{url('order')}}">
          @csrf
        <tbody>
          @foreach($cart as $data)
          <tr>
            <td>
              <input type="text" name="productname[]" value="{{$data->product_title}}" hidden>
              {{$data->product_title}}</td>
            <td>
              <input type="text" name="quantity[]" value="{{$data->quantity}}" hidden>
              {{$data->quantity}}</td>
            <td>
              <input type="text" name="price[]" value="{{$data->price}}" hidden>
              {{$data->price}}</td>
            <td><a href="{{url('delete-cart-item',$data->id)}}" class="btn btn-danger">Cancel</a></td>
          </tr>
          @endforeach
        </tbody>
        
      </table>
      <button class="btn btn-success">Confirm Order</button>
      </form>
    </div>
    @include('user.script')
  </body>
</html>