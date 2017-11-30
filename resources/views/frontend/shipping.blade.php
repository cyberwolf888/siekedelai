@extends('layouts.frontend')

@section('content')
<!-- Titlebar
================================================== -->
<section class="titlebar">
<div class="container">
	<div class="sixteen columns">
		<h2>Checkout</h2>
		
		<nav id="breadcrumbs">
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">Shop</a></li>
				<li><a href="#">Checkout</a></li>
				<li>Delivery</li>
			</ul>
		</nav>
	</div>
</div>
</section>


<!-- Content
================================================== -->

<!-- Container -->
<div class="container">

	<div class="eight columns">


	<!-- Checkout Content -->
	<a href="{{ route('frontend.checkout.billing') }}"><div class="checkout-section"><span>1</span> Billing Details <strong><i class="fa fa-edit"></i>Edit</strong> </div></a>
	<div class="checkout-content">
	
	<div class="four columns alpha">
		<ul class="address-review">
			<li><strong>Billing Address</strong></li>
			<li>{{ session('billing')['name'] }}</li>
			<li>{{ session('billing')['email'] }}</li>
			<li>{{ session('billing')['phone'] }}</li>
			
		</ul>
	</div>
	<div class="four columns alpha omega">
		<ul class="address-review">
			<li><strong>Shipping Address</strong></li>
			<li>{{ session('billing')['address'] }}</li>
		</ul>
	</div>
	<div class="clearfix"></div>
	</div>
	

	<div class="checkout-section active"><span>2</span> Delivery</div>
		<div class="checkout-delivery active">
		<form action="{{ route('frontend.checkout.shipping_proses') }}" method="post">
			{{ csrf_field() }}
		<ul class="delivery-options">
			<li><strong>Choose delivery option below</strong></li>
			<li>
				@foreach(App\Models\Setting::all() as $row)
				<div class="delivery-option">
					<input id="shipping-address{{ $row->id }}" type="radio" name="shipping_address" value="{{ $row->id }}" required />
					<label for="shipping-address{{ $row->id }}" class="checkbox">{{ $row->type }} <span> IDR {{ number_format($row->value,0,',','.') }}/kg<abbr class="sep">|</abbr> Delivery in 3 to 5 Business Days</span></label>
				</div>
				@endforeach
				<div class="clearfix"></div>
			
			</li>
		</ul>

		</div>
		<div class="clearfix"></div>
		<input type="submit" class="continue button color" name="continue" value="Continue" />
		</form>
		<a href="#"><div class="checkout-section"><span>3</span> Payment & Order Review</div></a>

		</div>
		<!-- CHeckout Content / End -->


	<!-- Checkout Cart -->
	<div class="eight columns">
		<div class="checkout-section cart">Shopping Cart</div>
		<!-- Cart -->
		<table class="checkout cart-table responsive-table">

			<tr>
				<th class="hide-on-mobile">Item</th>
				<th></th>
				<th>Price</th>
				<th>Qty</th>
				<th>Total</th>
			</tr>
					
			@foreach(Cart::instance('cart')->content() as $cart)
			<tr>
				<td class="hide-on-mobile"><img src="{{ $cart->model->getImageThumb() }}" style="width: 65px; height: 70px;" alt=""/></td>
				<td class="cart-title"><a href="#">{{ $cart->name }}</a></td>
				<td>IDR {{ number_format($cart->price,0,',','.') }}</td>
				<td class="qty-checkout">{{ $cart->qty }}</td>
				<td class="cart-total">IDR {{ number_format($cart->price*$cart->qty,0,',','.') }}</td>
			</tr>
			@endforeach


			</table>

			<!-- Apply Coupon Code / Buttons -->
			<table class="cart-table bottom">

				<tr>
				<th class="checkout-totals">
					<div class="checkout-subtotal">
						Subtotal: <span>IDR {{ \Cart::instance('cart')->total() }}</span>
					</div>
				</th>
				</tr>

			</table>
	</div>
	<!-- Checkout Cart / End -->


</div>
<!-- Container / End -->

<div class="margin-top-50"></div>

@endsection