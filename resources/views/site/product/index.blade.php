@extends('site.layouts.app')
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Products</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">

            @if(session('success'))
             <div class="alert alert-danger custom-alert">
               {{ session('success') }}
            </div>
           @endif

			<div class="row">
                <div class="col-md-12">
				@if(session('message'))
                  <div class="alert alert-success">
                    {{ session('message') }}
                 </div>
                @endif
                    <div class="product-filters">
                        <ul>
                         <li><a class="nav-link scrollto @if(Route::currentRouteName() == 'site.product.all') active @endif" href="{{route('site.product.all')}}">All</a></li>
                        @foreach($categories as $category)
    					  <li><a class="nav-link scrollto @if(Route::currentRouteName() == 'site.product.oneCat' && request()->id == $category->id) active @endif" href="{{route('site.product.oneCat',$category->id)}}">{{$category->Name}}</a></li>
    					@endforeach
                        </ul>
                    </div>
                </div>
            </div>


			<div class="row product-lists">
             @foreach ($products as $product)
				<div class="col-lg-4 col-md-6 text-center strawberry">
					<div class="single-product-item">
						<div class="product-image">
							<a href="#"><img src="{{ asset('images/'.$product->Image) }}" width="70px" alt=""></a>
						</div>
						<h3>{{ $product->Name }}</h3>
						<p class="product-price"><span>Per Kg</span> ${{ $product->Price }} </p>
						<a href="{{route('site.cart',$product->id)}}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
						<a href="{{ route('site.wishlist', $product->id) }}" class="wishlist-btn"><i class="fas fa-heart"></i> Add to Wishlist</a>
					</div>
				</div>
                @endforeach
                </div>
				</div>
		</div>
	</div>

	<!-- end products -->


@endsection
