@extends('layouts.frontend')

@section('content')
<!-- Titlebar
================================================== -->
<section class="titlebar">
<div class="container">
	<div class="sixteen columns">
		<h2>Shopping Cart</h2>
		
		<nav id="breadcrumbs">
			<ul>
				<li><a href="#">Home</a></li>
				<li>Shopping Cart</li>
			</ul>
		</nav>
	</div>
</div>
</section>

<div class="container cart">

	<div class="sixteen columns">

		<!-- Cart -->
		<table class="cart-table responsive-table">

			<tr>
				<th>Item</th>
				<th>Description</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total</th>
				<th></th>
			</tr>
			<?php $berat = 0; ?>
		
			@foreach(Cart::instance('cart')->content() as $cart)
            <?php $berat+=($cart->model->weight*$cart->qty); ?>
			<tr>
				<td><img src="{{ $cart->model->getImageThumb() }}" alt="" style="width: 100px; height: 150px;" /></td>
				<td class="cart-title"><a href="#">{{ $cart->name }}</a></td>
				<td>IDR {{ number_format($cart->price,0,',','.') }}</td>
				<td>
					<form action='#'>
						<div class="qtyminus"></div>
						<input type='text' name="quantity" value='{{ $cart->qty }}' class="qty" rowid="{{ $cart->rowId }}" readonly/>
						<div class="qtyplus"></div>
					</form>
				</td>
				<td class="cart-total">IDR {{ number_format($cart->price*$cart->qty,0,',','.') }}</td>
				<td><a href="#" class="cart-remove" rowid="{{ $cart->rowId }}"></a></td>
			</tr>
			 @endforeach

			</table>

			<!-- Apply Coupon Code / Buttons -->
			<table class="cart-table bottom">

				<tr>
				<th>
					<form action="#" method="get" class="apply-coupon">
						<input class="search-field" type="text" placeholder="Coupon Code" value=""/>
						<a href="#" class="button gray">Apply Coupon</a>
					</form>

					<div class="cart-btns">
						<a href="checkout-billing-details.html" class="button color cart-btns proceed">Proceed to Checkout</a>
						<a href="#" class="button gray cart-btns">Update Cart</a>
					</div>
				</th>
				</tr>

			</table>
	</div>


	<!-- Cart Totals -->
	<div class="eight columns cart-totals">
		<h3 class="headline">Cart Totals</h3><span class="line"></span><div class="clearfix"></div>

		<table class="cart-table margin-top-5">

			<tr>
				<th>Cart Subtotal</th>
				<td><strong>$178.00</strong></td>
			</tr>

			<tr>
				<th>Shipping and Handling</th>
				<td>Free Shipping</td>
			</tr>

			<tr>
				<th>Order Total</th>
				<td><strong>$178.00</strong></td>
			</tr>

		</table>
		<br>
		<!-- <a href="#" class="calculate-shipping"><i class="fa fa-arrow-circle-down"></i> Calculate Shipping</a> -->
	</div>

</div>

<div class="margin-top-40"></div>

@endsection

@push('scripts')

@endpush