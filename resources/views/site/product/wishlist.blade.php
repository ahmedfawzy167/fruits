@extends('site.layouts.app')
@section('content')

<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>See more Details</p>
						<h1>Wishlist Products</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
    @if($wishlistGet->isEmpty())
				  <div class="empty-cart-msg" style="width: 100%; height: 450px; display: flex; justify-content: center; align-items: center;"> 
				   <div class="container"> 
					<div class="row justify-content-center"> 
				     <div class="col-md-6 text-center"> 
					  <img src="{{ asset('site/assets/img/wishlist-icon-19.jpg') }}" width="250px">
					  <h1>Ready to make a wish?</h1> 
					  <button style="background-color: orange; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 15px; margin-top: 20px;"><a href="{{route('site.product.all')}}" style="text-decoration: none; color: white;">Add New Wishlists</a></button>
				    </div>
				    </div>
				    </div> 
				    </div>
				    @else
	<!-- single product -->
	@foreach($wishlistGet as $wishlist)
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="{{ asset('images/'.optional($wishlist->product)->Image) }}" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>{{ optional($wishlist->product)->Name}}</h3>
						<p class="single-product-pricing"><span>Per Kg</span> ${{ optional($wishlist->product)->Price}}</p>
						<p><strong>Categories: </strong>Fruits, Organic</p>
						<h4>Share:</h4>
						<ul class="product-share">
							<li><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="https://twitter.com/"><i class="fab fa-twitter"></i></a></li>
							<li><a href="https://www.linkedin.com/"><i class="fab fa-linkedin"></i></a></li>
						</ul>
						<h1><a href="{{ route('wishlist.destroy', ['id' => $wishlist->product->id ?? 0]) }}"><i class="far fa-window-close" width="100%"></i></a></h1>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	@endif
	<!-- end single product -->
@endsection