@extends('layouts.frontend')

@section('content')

<!-- Titlebar
================================================== -->
<section class="titlebar">
<div class="container">
	<div class="sixteen columns">
		<h2>Shop</h2>
		
		<nav id="breadcrumbs">
			<ul>
				<li><a href="{{ route('home') }}">Home</a></li>
				<li><a href="#">Products</a></li>
				<li>{{ $model->getType() }}</li>
			</ul>
		</nav>
	</div>
</div>
</section>

<div class="container">

<!-- Slider
================================================== -->
	<div class="eight columns" >
		<div class="slider-padding">
			<div id="product-slider-vertical" class="royalSlider rsDefault">
				@foreach($model->product_images as $img)
			    <a href="{{ url('assets/img/product/'.$model->id.'/'.$img->image) }}" class="mfp-gallery" title="First Title">
			    	<img class="rsImg" src="{{ url('assets/img/product/'.$model->id.'/'.$img->image) }}" data-rsTmb="{{ url('assets/img/product/'.$model->id.'/'.$img->image) }}" alt="" />
			    </a>
			    @endforeach
			 </div>
			 <div class="clearfix"></div>
		</div>
	</div>


<!-- Content
================================================== -->
	<div class="eight columns">
		<div class="product-page">
			
			<!-- Headline -->
			<section class="title">
				<h2>{{ $model->name }}</h2>
				@if($model->discount > 0)
				<span class="product-price-discount">
							IDR {{ number_format($model->price,0,',','.') }}
							<i>IDR {{ number_format($model->getDiscountPrice(),0,',','.') }}</i></span>
							<div class="product-discount">{{ $model->discount }}% OFF</div>
				@else
				<span class="product-price">IDR {{ number_format($model->price,0,',','.') }}</span>
				@endif
				
			</section>

			<!-- Text Parapgraph -->
			<section>
				<p class="margin-reset">{{ $model->description }}</p>

				<!-- Share Buttons -->	
				<div class="share-buttons">
					<ul>
						<li><a href="#">Share</a></li>
						<li class="share-facebook"><a href="#">Facebook</a></li>
						<li class="share-twitter"><a href="#">Twitter</a></li>
						<li class="share-gplus"><a href="#">Google Plus</a></li>
						<li class="share-pinit"><a href="#">Pin It</a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
								
			</section>


			<section class="linking">

					<form action='#'>
						<div class="qtyminus"></div>
						<input type='text' name="quantity" value='1' class="qty" id="quantity" />
						<div class="qtyplus"></div>
					</form>

					<a href="#" class="button adc" id="addcart">Add to Cart</a>
					<div class="clearfix"></div>

			</section>

		</div>
	</div>

</div>

<!-- Related Products -->
<div class="container margin-top-5">

	<!-- Headline -->
	<div class="sixteen columns">
		<h3 class="headline">Related Products</h3>
		<span class="line margin-bottom-0"></span>
	</div>

	<!-- Products -->
	<div class="products">

		<!-- Product #1 -->
		<div class="four columns">
			<figure class="product">
				<div class="mediaholder">
					<a href="#">
						<img alt="" src="images/shop_item_01.jpg"/>
						<div class="cover">
							<img alt="" src="images/shop_item_01_hover.jpg"/>
						</div>
					</a>
					<a href="#" class="product-button"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
				</div>

				<a href="#">
					<section>
						<span class="product-category">Skirts</span>
						<h5>Brown Mini Skirt</h5>
						<span class="product-price">$79.00</span>
					</section>
				</a>
			</figure>
		</div>

		<!-- Product #2 -->
		<div class="four columns">
			<figure class="product">
				<div class="mediaholder">
					<a href="#">
						<img alt="" src="images/shop_item_04.jpg"/>
						<div class="cover">
							<img alt="" src="images/shop_item_04_hover.jpg"/>
						</div>
					</a>
					<a href="#" class="product-button"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
				</div>

				<a href="#">
					<section>
						<span class="product-category">Shirts</span>
						<h5>Vintage Stripe Jumper</h5>
						<span class="product-price">$49.00</span>
					</section>
				</a>
			</figure>
		</div>

		<!-- Product #3 -->
		<div class="four columns">
			<figure class="product">
				<div class="mediaholder">
					<a href="#">
						<img alt="" src="images/shop_item_07.jpg"/>
						<div class="cover">
							<img alt="" src="images/shop_item_07_hover.jpg"/>
						</div>
					</a>
					<a href="#" class="product-button"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
				</div>

				<a href="#">
					<section>
						<span class="product-category">Shirts</span>
						<h5>Shirt in Navy Stripe</h5>
						<span class="product-price">$49.00</span>
					</section>
				</a>
			</figure>
		</div>

		<!-- Product #4 -->
		<div class="four columns">
			<figure class="product">
				<div class="mediaholder">
					<a href="#">
						<img alt="" src="images/shop_item_09.jpg"/>
						<div class="cover">
							<img alt="" src="images/shop_item_09_hover.jpg"/>
						</div>
					</a>
					<a href="#" class="product-button"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
				</div>

				<a href="#">
					<section>
						<span class="product-category">Shirts</span>
						<h5>Long Sleeve Check Shirt</h5>
						<span class="product-price">$69.00</span>
					</section>
				</a>
			</figure>
		</div>

	</div>
</div>

<div class="margin-top-50"></div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $("#addcart").click(function () {
            var qty = $("#quantity").val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '<?= route('frontend.cart.insert') ?>',
                type: 'POST',
                data: {qty:qty, product_id:'<?= $model->id ?>'},
                success: function (data) {
                    //console.log(data);
                    location.reload();
                }
            });
        });
    })
</script>
@endpush