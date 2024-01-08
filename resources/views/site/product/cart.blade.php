@extends('site.layouts.app')
@section('content')

    <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
	@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

	<!-- cart -->
	@if($cartGet->isEmpty())
		<div class="empty-cart-msg" style="width: 100%; height: 450px; display: flex; justify-content: center; align-items: center;">
		  <div class="container">
			<div class="row justify-content-center">
			  <div class="col-md-6 text-center">
				<img src="{{ asset('site/assets/img/free-shopping-cart-icon-27.jpg') }}" width="250px">
				 <h1>Your shopping cart is empty!</h1>
				  <button style="background-color: orange; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 15px; margin-top: 20px;"><a href="{{route('site.product.all')}}" style="text-decoration: none; color: white;">Start Shopping</a></button>
			  </div>
			  </div>
			  </div>
			  </div>
	           @else

     	<div class="cart-section mt-150 mb-150">
		 <div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove">Remove from cart</th>
									<th class="product-image">Product Image</th>
									<th class="product-name">Product Name</th>
									<th class="product-price">Price</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody>
                                @foreach($cartGet as $cart)
								<tr class="table-body-row">
									<td class="product-remove"><a href="{{ route('cart.destroy', ['id' => $cart->product->id ?? 0]) }}"><i class="far fa-window-close"></i></a></td>
									<td class="product-image"><img src="{{ asset('images/'.optional($cart->product)->Image) }}"></td>
									<td class="product-name">{{ optional($cart->product)->Name}}</td>
									<td class="product-price">${{optional($cart->product)->Price}}</td>
									<td class="product-total">${{optional($cart->product)->Price}}</td>
								</tr>
                               @endforeach
						    </tbody>
						    </table>
                           </div>
			               </div>
						   @endif
                   @if(!$cartGet->isEmpty())
				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
								  <th>Total</th>
								  <th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
								  <td><strong>Subtotal: </strong></td>
								  <td>${{ $subtotal}}</td>
								</tr>
								<tr class="total-data">
								  <td><strong>Shipping: </strong></td>
								  <td>${{ $shipping }}</td>
								</tr>
								@if(isset($discount))
								<tr class="total-data">
								  <td><strong>Discount: </strong></td>
								  <td>${{ $discount}}</td>
								</tr>
								@endif
								<tr class="total-data">
								  <td><strong>Total: </strong></td>
								  <td>${{ $pricesum }}</td>
								</tr>
							</tbody>
						</table>
						</div>
                        </div>
                        @endif


					@if(!$cartGet->isEmpty())
					<div class="coupon-section" >
						<h3>Apply Coupon</h3>
						<div class="coupon-form-wrap">
							<form action="{{ route('apply.cart') }}" method="POST">
								@csrf
								<p><input type="text" name="code" placeholder="Coupon"></p>
								<div style="text-align: center;">
								 <p><input type="submit" value="Apply"></p>
                                </div>
							</form>
						</div>

				</div>
				@endif
			</div>
	</div>
    @if(!$cartGet->isEmpty())
    <div class="col-md-12 ml-5">
        <div class="cart-detail p-3 p-md-4">
            <h3 class="billing-heading mb-4">Payment Method</h3>
                      <div class="form-group">
                          <div class="col-md-12">
                              <div class="radio">
                                 <label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-12">
                              <div class="radio">
                                 <label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-12">
                              <div class="radio">
                                 <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-12">
                              <div class="checkbox">
                                 <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
                              </div>
                          </div>
                      </div>
                  </div>
    </div>
    @endif


						@if(!$cartGet->isEmpty())
						<div class="cart-buttons">
						<form action="{{ route('orders.store', optional($cart->product)->id ?? '') }}" method="POST">
                          @csrf
						  @if(isset($cart))
						  <input type="hidden" name="product_id" value="{{ optional($cart->product)->id }}">
						  @endif
						  <div style="display: flex; justify-content: center; align-items: center;">
						  <input type="submit" class="boxed-btn" value="Place Order">
						  </div>
                        </form>
						</div>
						@endif
					</div>


	<!-- end cart -->
@endsection
