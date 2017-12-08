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
				<li>Payment & Order Review</li>
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
	

		<a href="{{ route('frontend.checkout.shipping') }}"><div class="checkout-section"><span>2</span> Delivery <strong><i class="fa fa-edit"></i>Edit</strong> </div></a>
		<div class="checkout-delivery">

			<div class="eight columns alpha omega">
				<ul class="address-review delivery">
					<li><strong>{{ session('shipping')['type'] }} <span class="delivery-summary">IDR {{ number_format(session('shipping')['value'],0,',','.') }}/kg</strong></li>
				</ul>
			</div>
			<div class="clearfix"></div>

		</div>
		<div class="clearfix"></div>

			<div class="checkout-section active"><span>3</span> Payment & Order Review</div>
			<div class="checkout-summary">
				<div class="eight columns alpha omega">
					<ul class="address-review summary">
						<li><strong>Transfer Bank</strong></li>
						<li class="credit-card-fields">
							Silakan lakukan transfer bank ke salah satu rekening berikut
							<h3>Bank BCA</h3>
							<span>89938388393</span><br>
							<span>A/n Bedebah</span>
							<br><br>
							<h3>Bank Mandiri</h3>
							<span>89938388393</span><br>
							<span>A/n Bedebah</span>
							<div class="clearfix"></div>
						</li>
					</ul>
				</div>
			</div>
		<form action="{{ route('frontend.checkout.order_proses') }}" method="post">
			{{ csrf_field() }}
			<input type="submit" class="continue button color" name="continue" value="Place Order" />
		</form>
		</div>
		<!-- Checkout Content / End -->


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
            <?php $berat = 0; ?>
			@foreach(Cart::instance('cart')->content() as $cart)
			<?php $berat+=($cart->model->berat*$cart->qty); ?>
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
					<div class="checkout-subtotal">Subtotal: <span>IDR {{ \Cart::instance('cart')->total() }}</span></div><br>
					<div class="checkout-subtotal">Shipping & Handling: <span>IDR {{ number_format($berat * session('shipping')['value'],0,',','.') }}</span></div><br>
					<div class="checkout-subtotal summary">Order Total: <span>IDR {{ number_format(\Cart::instance('cart')->total(0,'','')+$berat * session('shipping')['value'],0,',','.') }}</span></div>
				</th>
				</tr>

			</table>
	</div>
	<!-- Checkout Cart / End -->


</div>
<!-- Container / End -->

<div class="margin-top-30"></div>

@endsection