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
            <?php $berat+=($cart->model->berat*$cart->qty); ?>
			<tr>
				<td><img src="{{ $cart->model->getImageThumb() }}" alt="" style="width: 100px; height: 150px;" /></td>
				<td class="cart-title"><a href="#">{{ $cart->name }}</a></td>
				<td>IDR {{ number_format($cart->price,0,',','.') }}</td>
				<td>
					<form action='#'>
						<div class="qtybtn qtyminus"></div>
						<input type='text' name="quantity" value='{{ $cart->qty }}' class="qty" rowid="{{ $cart->rowId }}" readonly/>
						<div class="qtybtn qtyplus"></div>
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

					<div class="cart-btns">
						<a href="{{ route('frontend.checkout.billing') }}" class="button color cart-btns proceed">Proceed to Checkout</a>
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
				<td><strong>IDR {{ \Cart::instance('cart')->total() }}</strong></td>
			</tr>

		</table>
		<br>
		<!-- <a href="#" class="calculate-shipping"><i class="fa fa-arrow-circle-down"></i> Calculate Shipping</a> -->
	</div>

</div>

<div class="margin-top-40"></div>

@endsection

@push('scripts')
<script>

    $('.qtybtn').on('click', function() {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        var rowId = $button.parent().find('input').attr("rowid");
        if ($button.hasClass('qtyplus')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        //alert(newVal);
        //$button.parent().find('input').val(newVal);
        update_cart(rowId,newVal);
    });

    $('.cart-remove').on('click', function() {
        var $button = $(this);
        var rowId = $button.attr("rowid");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '<?= route('frontend.cart.delete') ?>',
            type: 'POST',
            data: {rowId:rowId},
            success: function (data) {
                //console.log(data);
                location.reload();
            }
        });
    });

    function update_cart(rowid,qty)
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '<?= route('frontend.cart.update') ?>',
            type: 'POST',
            data: {rowId:rowid,qty:qty},
            success: function (data) {
                //console.log(data);
                location.reload();
            }
        });
    }
</script>
@endpush