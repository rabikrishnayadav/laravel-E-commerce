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
      <table class="table table-bordered table-hover table-striped table-responsive-sm text-center">
        <thead class="bg-secondary text-light">
          <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>price</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cart as $data)
          <tr>
            <td>{{$data->product_title}}</td>
            <td>{{$data->quantity}}</td>
            <td>{{$data->price}}</td>
            
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
    
   
    @include('user.script')
  </body>
</html>