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
 					<img src="{{ url('assets/frontend') }}/images/slider2.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
 					<div class="caption dark sfb fadeout" data-x="750" data-y="170" data-speed="400" data-start="800"  data-easing="Power4.easeOut">
						<h2>Urban Style</h2>
						<h3>Every cut and colour</h3>
						<a href="shop-with-sidebar.html" class="caption-btn">Shop The Collection</a>
					</div>
				</li>


				<!-- Slide 2  -->
				<li data-transition="zoomout" data-slotamount="7" data-masterspeed="1500" >
					<img src="{{ url('assets/frontend') }}/images/slider.jpg"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
 					<div class="caption sfb fadeout" data-x="145" data-y="170" data-speed="400" data-start="800"  data-easing="Power4.easeOut">
						<h2>Dress Sharp</h2>
						<h3>Learn from the classics</h3>
						<a href="shop-with-sidebar.html" class="caption-btn">Shop The Collection</a>
					</div>
				</li>


				<!-- Slide 3  -->
				<li data-transition="fadetotopfadefrombottom" data-slotamount="7" data-masterspeed="1000">
 					<img src="{{ url('assets/frontend') }}/images/slider3.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
 					<div class="caption dark sfb fadeout" data-x="850" data-y="170" data-speed="400" data-start="800"  data-easing="Power4.easeOut">
						<h2>New In</h2>
						<h3>Pants and T-Shirts</h3>
						<a href="shop-with-sidebar.html" class="caption-btn">Shop The Collection</a>
					</div>
				</li>

			</ul>
		</div>
	</div>
</div>

<div class="container">

	<!-- Content
	================================================== -->

	<div class="sixteen columns full-width">

		<!-- Ordering -->
		<select class="orderby">
			<option>Default Sorting</option>
			<option>Sort by Popularity</option>
			<option>Sort by Newness</option>
		</select>

	</div>

	<!-- Products -->
	<div class="products">

		<!-- Product #1 -->
		<div class="four columns">
			<figure class="product">
				<div class="mediaholder">
					<a href="variable-product-page.html">
						<img alt="" src="{{ url('assets/frontend') }}/images/shop_item_01.jpg"/>
						<div class="cover">
							<img alt="" src="{{ url('assets/frontend') }}/images/shop_item_01_hover.jpg"/>
						</div>
					</a>
					<a href="#" class="product-button"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
				</div>

				<a href="variable-product-page.html">
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
					<a href="single-product-page.html">
						<img alt="" src="{{ url('assets/frontend') }}/images/shop_item_02.jpg"/>
						<div class="cover">
							<img alt="" src="{{ url('assets/frontend') }}/images/shop_item_02_hover.jpg"/>
						</div>
					</a>
					<a href="#" class="product-button"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
				</div>

				<a href="single-product-page.html">
					<section>
						<span class="product-category">Shoes</span>
						<h5>Glory High Shoes </h5>
						<span class="product-price">$99.00</span>
					</section>
				</a>
			</figure>
		</div>


		<!-- Product #3 -->
		<div class="four columns">
			<figure class="product">
				<div class="product-discount">SALE</div>
				<div class="mediaholder">
					<a href="variable-product-page.html">
						<img alt="" src="{{ url('assets/frontend') }}/images/shop_item_03.jpg"/>
						<div class="cover">
							<img alt="" src="{{ url('assets/frontend') }}/images/shop_item_03_hover.jpg"/>
						</div>
					</a>
					<a href="#" class="product-button"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
				</div>

				<a href="variable-product-page.html">
					<section>
						<span class="product-category">Suits</span>
						<h5>Wool Two-Piece Suit</h5>
						<span class="product-price-discount">$499.00<i>$399.00</i></span>
					</section>
				</a>
			</figure>
		</div>


		<!-- Product #4 -->
		<div class="four columns">
			<figure class="product">
				<div class="mediaholder">
					<a href="variable-product-page.html">
						<img alt="" src="{{ url('assets/frontend') }}/images/shop_item_04.jpg"/>
						<div class="cover">
							<img alt="" src="{{ url('assets/frontend') }}/images/shop_item_04_hover.jpg"/>
						</div>
					</a>
					<a href="#" class="product-button"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
				</div>

				<a href="variable-product-page.html">
					<section>
						<span class="product-category">Shirts</span>
						<h5>Vintage Stripe Jumper</h5>
						<span class="product-price">$49.00</span>
					</section>
				</a>
			</figure>
		</div>


		<!-- Product #5 -->
		<div class="four columns">
			<figure class="product">
				<div class="mediaholder">
					<a href="single-product-page.html">
						<img alt="" src="{{ url('assets/frontend') }}/images/shop_item_05.jpg"/>
						<div class="cover">
							<img alt="" src="{{ url('assets/frontend') }}/images/shop_item_05_hover.jpg"/>
						</div>
					</a>
					<a href="#" class="product-button"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
				</div>

				<a href="single-product-page.html">
					<section>
						<span class="product-category">Accessories</span>
						<h5>Vintage Sunglasses</h5>
						<span class="product-price">$29.00</span>
					</section>
				</a>
			</figure>
		</div>


		<!-- Product #6 -->
		<div class="four columns">
			<figure class="product">
				<div class="mediaholder">
					<a href="variable-product-page.html">
						<img alt="" src="{{ url('assets/frontend') }}/images/shop_item_06.jpg"/>
						<div class="cover">
							<img alt="" src="{{ url('assets/frontend') }}/images/shop_item_06_hover.jpg"/>
						</div>
					</a>
					<a href="#" class="product-button"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
				</div>

				<a href="variable-product-page.html">
					<section>
						<span class="product-category">Shirts</span>
						<h5>Solid Blue Polo Shirt</h5>
						<span class="product-price">$29.00</span>
					</section>
				</a>
			</figure>
		</div>


		<!-- Product #7 -->
		<div class="four columns">
			<figure class="product">
				<div class="mediaholder">
					<a href="variable-product-page.html">
						<img alt="" src="{{ url('assets/frontend') }}/images/shop_item_07.jpg"/>
						<div class="cover">
							<img alt="" src="{{ url('assets/frontend') }}/images/shop_item_07_hover.jpg"/>
						</div>
					</a>
					<a href="#" class="product-button"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
				</div>

				<a href="variable-product-page.html">
					<section>
						<span class="product-category">Shirts</span>
						<h5>Shirt in Navy Stripe</h5>
						<span class="product-price">$49.00</span>
					</section>
				</a>
			</figure>
		</div>


		<!-- Product #8 -->
		<div class="four columns">
			<figure class="product">
				<div class="mediaholder">
					<a href="single-product-page.html">
						<img alt="" src="{{ url('assets/frontend') }}/images/shop_item_09.jpg"/>
						<div class="cover">
							<img alt="" src="{{ url('assets/frontend') }}/images/shop_item_09_hover.jpg"/>
						</div>
					</a>
					<a href="#" class="product-button"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
				</div>

				<a href="single-product-page.html">
					<section>
						<span class="product-category">Shirts</span>
						<h5>Long Sleeve Check Shirt</h5>
						<span class="product-price">$69.00</span>
					</section>
				</a>
			</figure>
		</div>
		<div class="clearfix"></div>


		<!-- Pagination -->
		<div class="pagination-container">
			<nav class="pagination">
				<ul>
					<li><a href="#" class="current-page">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
				</ul>
			</nav>

			<nav class="pagination-next-prev full-width">
				<ul>
					<li><a href="#" class="prev"></a></li>
					<li><a href="#" class="next"></a></li>
				</ul>
			</nav>
		</div>

	</div>

</div>

<div class="margin-top-15"></div>




@endsection