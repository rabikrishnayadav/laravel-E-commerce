<!DOCTYPE html>
<html lang="en">
    <head>
        @include('user.css')
    </head>
    <body>
        <!-- Header -->
        @include('user.header')
        <!-- Page Content -->
        <div class="page-heading products-heading header-text">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-content">
                            <h4>new arrivals</h4>
                            <h2>sixteen products</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="products">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                            <button type="button" class="close" data-dismiss="alert">X</button>
                        </div>
                        @endif
                        <div class="filters">
                            <form class="form-inline" style="float:right;" action="{{url('search')}}" method="get">
                                @csrf
                                <input type="search" name="search" placeholder="search product" value="" class="m-2">
                                <input type="submit" name="" value="Search" class="btn bg-primary text-light">
                            </form>
                            <ul>
                                <li class="active" data-filter="*">All Products</li>
                                <li data-filter=".des">Featured</li>
                                <li data-filter=".dev">Flash Deals</li>
                                <li data-filter=".gra">Last Minute</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="filters-content">
                            <div class="row grid">
                                @foreach($data as $product)
                                <div class="col-lg-4 col-md-4 all des">
                                    <div class="product-item">
                                        <a href="#"><img src="images/product_image/{{$product->image}}" alt="" style="height:200px; width:inherit;" class="img-fluid"></a>
                                        <div class="down-content">
                                            <a href="#"><h4>{{$product->title}}</h4></a>
                                            <h6>Rs.{{$product->price}}/-</h6>
                                            <p>{{$product->description}}</p>
                                            <form method="post" action="{{url('addcart',$product->id)}}">
                                                @csrf
                                                <input type="number" name="quantity" value="1" min="1" class="form-control" style="width:100px;"><br>
                                                <input type="submit" class="btn btn-primary" value="Add Cart" style="float:left;">
                                            </form>
                                            <ul class="stars">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                            <span>Reviews (72)</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        @if(method_exists($data,'links'))
                        <div>
                            {!! $data->links() !!}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('user.happy-client')
        @include('user.footer')
        @include('user.script')
    </body>
</html>