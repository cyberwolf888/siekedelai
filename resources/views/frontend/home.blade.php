@extends('layouts.frontend')

@section('content')
<!-- Slider
================================================== -->
<div class="container fullwidth-element home-slider">

	<div class="tp-banner-container">
		<div class="tp-banner">
			<ul>

				<!-- Slide 1  -->
				<li data-transition="fade" data-slotamount="7" data-masterspeed="1000">
 					<img src="{{ url('assets/frontend') }}/images/1.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
 					<div class="caption dark sfb fadeout" data-x="750" data-y="170" data-speed="400" data-start="800"  data-easing="Power4.easeOut">
						<h2>Local soy seed</h2>
						<h3>Every taste and colour</h3>
						<a href="{{ route('frontend.local') }}" class="caption-btn">See more</a>
					</div>
				</li>


				<!-- Slide 2  -->
				<li data-transition="zoomout" data-slotamount="7" data-masterspeed="1500" >
					<img src="{{ url('assets/frontend') }}/images/2.jpg"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
 					<div class="caption sfb fadeout" data-x="145" data-y="170" data-speed="400" data-start="800"  data-easing="Power4.easeOut">
						<h2>Impor soy seed</h2>
						<h3>The best you can get</h3>
						<a href="{{ route('frontend.impor') }}" class="caption-btn">See more</a>
					</div>
				</li>



			</ul>
		</div>
	</div>
</div>

<div class="container">

	<!-- Content
	================================================== -->

	<!-- Products -->
	<div class="products">
		<?php $products = App\Models\Product::orderBy('id','desc')->limit(8)->get() ?>

		@foreach ($products as $row)
		<div class="four columns">
			<figure class="product">
				@if($row->discount > 0)
				<div class="product-discount">{{ $row->discount }}% OFF</div>
				@endif
				<div class="mediaholder">
					<a href="{{ $row->getDetailLink() }}">
						<img alt="" src="{{ $row->getImageThumb() }}"/>
						<div class="cover">
							<img alt="" src="{{ $row->getImageCover() }}"/>
						</div>
					</a>
					<a href="{{ $row->getDetailLink() }}" class="product-button"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
				</div>

				<a href="{{ $row->getDetailLink() }}">
					<section>
						<span class="product-category">{{ $row->getType() }}</span>
						<h5>{{ $row->name }}</h5>
						@if($row->discount > 0)
						<span class="product-price-discount">
							IDR {{ number_format($row->price,0,',','.') }}
							<i>IDR {{ number_format($row->getDiscountPrice(),0,',','.') }}</i></span>
						@else
						<span class="product-price">IDR {{ number_format($row->price,0,',','.') }}</span>
						@endif
					</section>
				</a>
			</figure>
		</div>
		@endforeach

		<div class="clearfix"></div>

	</div>

</div>

<div class="margin-top-15"></div>
@endsection