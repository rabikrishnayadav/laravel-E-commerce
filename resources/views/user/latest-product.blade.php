<div class="latest-products">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Latest Products</h2>
          @if(session()->has('message'))
          <div class="alert alert-success">
            {{session()->get('message')}}
            <button type="button" class="close" data-dismiss="alert">X</button>
          </div>
          @endif
          <a href="{{route('product-page')}}">view all products <i class="fa fa-angle-right"></i></a>
        </div>
      </div>
      @foreach($data as $product)
      <div class="col-md-4">
        <div class="product-item">
          <a href="#"><img src="images/product_image/{{$product->image}}" alt="" style="height:200px; width:inherit;" class="img-fluid"></a>
          <div class="down-content">
            <a href="#"><h4>{{$product->title}}</h4></a>
            <h6>Rs.{{$product->price}}/-</h6>
            <p>{{$product->description}}</p>
            <form method="post" action="{{url('addcart',$product->id)}}">
              @csrf
              <input type="number" name="quantity" value="1" min="1" class="form-control" style="width:100px;"><br>
              <input type="submit" class="btn bg-primary text-light" value="Add Cart" style="float:left;">
            </form>
            <ul class="stars">
              <li><i class="fa fa-star"></i></li>
              <li><i class="fa fa-star"></i></li>
              <li><i class="fa fa-star"></i></li>
              <li><i class="fa fa-star"></i></li>
              <li><i class="fa fa-star"></i></li>
            </ul>
            <span>Reviews (32)</span>
          </div>
        </div>
      </div>
      @endforeach
      @if(method_exists($data,'links'))
      <div class="d-flex justify-content-center ">
        {!! $data->links() !!}
      </div>
      @endif
    </div>
  </div>
</div>