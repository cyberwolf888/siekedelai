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
				<li>Billing Details</li>
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

	<!-- Billing Details Content -->
	<div class="checkout-section active"><span>1</span> Billing Details</div>
		<div class="checkout-content">
			<form method="post" action="{{ route('frontend.checkout.billing_proses') }}">
			{{ csrf_field() }}
			<div class="fullwidth">
				<label>Full Name: <abbr>*</abbr></label>
				<input type="text" placeholder="" name="name"  value="{{ Auth::user()->name }}" required />
			</div>

			<label>Street Address: <abbr>*</abbr></label>
			<input type="text" class="input-text " name="address"  value="{{ Auth::user()->address }}"  required />

			<div class="half first">
				<label>Email Adress: <abbr>*</abbr></label>
				<input type="text" placeholder="" name="email" value="{{ Auth::user()->email }}" required />
			</div>
			<div class="half">
				<label>Phone: <abbr>*</abbr></label>
				<input type="text" placeholder="" name="phone"  value="{{ Auth::user()->phone }}" required />
			</div>

			<div class="clearfix"></div>

		</div>
		<div class="clearfix"></div>
		<input type="submit" class="continue button color" name="continue" value="Continue" />


		<a href="#"><div class="checkout-section"><span>2</span> Delivery</div></a>
		<a href="#"><div class="checkout-section"><span>3</span> Payment & Order Review</div></a>
		</div>
		<!-- Billing Details / Enc -->


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