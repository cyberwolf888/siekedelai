<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>SIE Kedelai</title>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ url('assets/frontend') }}/css/style.css">
    <link rel="stylesheet" href="{{ url('assets/frontend') }}/css/colors/green.css" id="colors">
    @stack('plugin_css')

    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body class="boxed">
<div id="wrapper">


    <!-- Top Bar
    ================================================== -->
    <div id="top-bar">
        <div class="container">

            <!-- Top Bar Menu -->
            <div class="ten columns">
                <ul class="top-bar-menu">
                    <li><i class="fa fa-phone"></i> (081) 123 4567</li>
                    <li><i class="fa fa-envelope"></i> <a href="#"><span class="__cf_email__" data-cfemail="0b666a62674b6e736a667b676e25686466">[email&#160;protected]</span></a></li>
                </ul>
            </div>

            <!-- Social Icons -->
            <div class="six columns">
                <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                    <li><a class="dribbble" href="#"><i class="icon-dribbble"></i></a></li>
                    <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                    <li><a class="pinterest" href="#"><i class="icon-pinterest"></i></a></li>
                </ul>
            </div>

        </div>
    </div>

    <div class="clearfix"></div>


    <!-- Header
    ================================================== -->
    <div class="container">


        <!-- Logo -->
        <div class="four columns">
            <div id="logo">
                <h1><a href="{{ route('home') }}"><img src="{{ url('assets') }}/img/logo.png" alt="Trizzy" /> Soy Store</a></h1>
            </div>
        </div>


        <!-- Additional Menu -->
        <div class="twelve columns">
            <div id="additional-menu">
                <ul>
                    <li><a href="{{ route('frontend.cart.manage') }}">Shopping Cart</a></li>
                    <li><a href="{{ route('frontend.checkout.billing') }}">Checkout</a></li>
                    @if(Auth::check())
                    <li><a href="{{ route('member.order_history') }}">Order History</a></li>
                    <li><a href="{{ route('member.profile') }}">Profile</a></li>
                    <li>
                        <a href="#" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @else
                    <li><a href="{{ route('login') }}">My Account</a></li>
                    @endif
                    
                </ul>
            </div>
        </div>


        <!-- Shopping Cart -->
        <div class="twelve columns">

            <div id="cart">

                <!-- Button -->
                <div class="cart-btn">
                    <a href="#" class="button adc">{{ \Cart::instance('cart')->count() }}</a>
                </div>

                <div class="cart-list">

                    <div class="arrow"></div>

                    <div class="cart-amount">
                        <span>{{ \Cart::instance('cart')->count() }} items in the shopping cart</span>
                    </div>
                    @if(\Cart::instance('cart')->count()>0)
                    <ul>
                         @foreach(Cart::instance('cart')->content() as $row)
                        <li>
                            <a href="#"><img src="{{ $row->model->getImageThumb() }}" alt="" /></a>
                            <a href="#">{{ $row->model->name }}</a>
                            <span>{{ $row->qty }} x {{ number_format($row->price,0,',','.') }}</span>
                            <div class="clearfix"></div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="cart-buttons button">
                        <a href="{{ route('frontend.cart.manage') }}" class="view-cart" ><span data-hover="View Cart"><span>View Cart</span></span></a>
                        <a href="checkout-billing-details.html" class="checkout"><span data-hover="Checkout">Checkout</span></a>
                    </div>
                    @else
                    <h3>Cart is empty</h3>
                    @endif
                    <div class="clearfix">

                    </div>
                </div>

            </div>

            <!-- Search -->
            <nav class="top-search">
                <form action="{{ route('frontend.search') }}" method="post">
                    {{ csrf_field() }}
                    <button><i class="fa fa-search"></i></button>
                    <input class="search-field" type="text" placeholder="Search" value="" name="keyword"/>
                </form>
            </nav>

        </div>

    </div>


    <!-- Navigation
    ================================================== -->
    <div class="container">
        <div class="sixteen columns">

            <a href="#menu" class="menu-trigger"><i class="fa fa-bars"></i> Menu</a>

            <nav id="navigation">
                <ul class="menu" id="responsive">

                    <li><a href="{{ route('home') }}" class="current homepage" id="current">Home</a></li>
                    <li class="demo-button">
                        <a href="{{ route('frontend.local') }}">Local</a>
                    </li>
                    <li class="demo-button">
                        <a href="{{ route('frontend.impor') }}">Impor</a>
                    </li>
                    <li class="demo-button">
                        <a href="{{ route('frontend.best_seller') }}">Best Seller</a>
                    </li>

                </ul>
            </nav>
        </div>
    </div>

    @yield('content')

    <!-- Footer
    ================================================== -->
    <div id="footer">

        <!-- Container -->
        <div class="container">

            <div class="four columns">
                <img src="{{ url('assets') }}/img/logo.png" alt="" class="margin-top-10"/>
                <p class="margin-top-15">Nulla facilisis feugiat magna, ut molestie metus hendrerit vitae. Vivamus tristique lectus at varius rutrum. Integer lobortis mauris non consectetur eleifend.</p>
            </div>

            <div class="four columns">

                <!-- Headline -->
                <h3 class="headline footer">Menu</h3>
                <span class="line"></span>
                <div class="clearfix"></div>

                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="#">Local</a></li>
                    <li><a href="#">Impor</a></li>
                    <li><a href="#">Best Seller</a></li>
                </ul>

            </div>

            <div class="four columns">

                <!-- Headline -->
                <h3 class="headline footer">My Account</h3>
                <span class="line"></span>
                <div class="clearfix"></div>

                <ul class="footer-links">
                    <li><a href="{{ route('member.profile') }}">My Account</a></li>
                    <li><a href="{{ route('member.order_history') }}">Order History</a></li>
                </ul>

            </div>

            <div class="four columns">

                <!-- Headline -->
                <h3 class="headline footer">Newsletter</h3>
                <span class="line"></span>
                <div class="clearfix"></div>
                <div class="notification success closeable mailchimp-success" style="display: none;">
                </div>
                <div class="notification error closeable mailchimp-error" style="display: none;">
                </div>
                <p>Sign up to receive email updates on new product announcements, gift ideas, special promotions, sales and more.</p>

                <form action="#" method="get" id="mc-form">
                    <button class="newsletter-btn" type="submit" id="btn_join">Join</button>
                    <input name="news_email" id="news_email" class="newsletter" type="text" placeholder="mail@example.com" value=""/>
                </form>
            </div>

        </div>
        <!-- Container / End -->

    </div>
    <!-- Footer / End -->

    <!-- Footer Bottom / Start -->
    <div id="footer-bottom">

        <!-- Container -->
        <div class="container">

            <div class="eight columns">© Copyright {{ date('Y') }} by <a href="#">STIKOM Bali</a>. All Rights Reserved.</div>
            <div class="eight columns">
                <ul class="payment-icons">
                    <li><img src="{{ url('assets/frontend') }}/images/visa.png" alt="" /></li>
                    <li><img src="{{ url('assets/frontend') }}/images/mastercard.png" alt="" /></li>
                    <li><img src="{{ url('assets/frontend') }}/images/skrill.png" alt="" /></li>
                    <li><img src="{{ url('assets/frontend') }}/images/moneybookers.png" alt="" /></li>
                    <li><img src="{{ url('assets/frontend') }}/images/paypal.png" alt="" /></li>
                </ul>
            </div>

        </div>
        <!-- Container / End -->

    </div>
    <!-- Footer Bottom / End -->

    <!-- Back To Top Button -->
    <div id="backtotop"><a href="#"></a></div>

</div>


<!-- Java Script
================================================== -->
<script src="{{ url('assets/frontend') }}/scripts/email-decode.min.js"></script>
<script src="{{ url('assets/frontend') }}/scripts/jquery-1.11.0.min.js"></script>
<script src="{{ url('assets/frontend') }}/scripts/jquery-migrate-1.2.1.min.js"></script>
<script src="{{ url('assets/frontend') }}/scripts/jquery.jpanelmenu.js"></script>
<script src="{{ url('assets/frontend') }}/scripts/jquery.themepunch.plugins.min.js"></script>
<script src="{{ url('assets/frontend') }}/scripts/jquery.themepunch.revolution.min.js"></script>
<script src="{{ url('assets/frontend') }}/scripts/jquery.themepunch.showbizpro.min.js"></script>
<script src="{{ url('assets/frontend') }}/scripts/jquery.magnific-popup.min.js"></script>
<script src="{{ url('assets/frontend') }}/scripts/hoverIntent.js"></script>
<script src="{{ url('assets/frontend') }}/scripts/superfish.js"></script>
<script src="{{ url('assets/frontend') }}/scripts/jquery.pureparallax.js"></script>
<script src="{{ url('assets/frontend') }}/scripts/jquery.pricefilter.js"></script>
<script src="{{ url('assets/frontend') }}/scripts/jquery.selectric.min.js"></script>
<script src="{{ url('assets/frontend') }}/scripts/jquery.royalslider.min.js"></script>
<script src="{{ url('assets/frontend') }}/scripts/SelectBox.js"></script>
<script src="{{ url('assets/frontend') }}/scripts/modernizr.custom.js"></script>
<script src="{{ url('assets/frontend') }}/scripts/waypoints.min.js"></script>
<script src="{{ url('assets/frontend') }}/scripts/jquery.flexslider-min.js"></script>
<script src="{{ url('assets/frontend') }}/scripts/jquery.counterup.min.js"></script>
<script src="{{ url('assets/frontend') }}/scripts/jquery.tooltips.min.js"></script>
<script src="{{ url('assets/frontend') }}/scripts/jquery.isotope.min.js"></script>
<script src="{{ url('assets/frontend') }}/scripts/puregrid.js"></script>
<script src="{{ url('assets/frontend') }}/scripts/stacktable.js"></script>
<script src="{{ url('assets/frontend') }}/scripts/custom.js"></script>
@stack('plugin_scripts')
<script>
    $('#mc-form').submit(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '<?= route('frontend.subscribe') ?>',
            type: 'POST',
            data: {news_email:$("#news_email").val()},
            success: function (data) {
                if(data == "1"){
                    $('.mailchimp-success').html('' + "Thank you for your subscribe!").fadeIn(900);
                    $('.mailchimp-error').fadeOut(400);
                }else{
                    $('.mailchimp-error').html('' + "Your are already subscriber!").fadeIn(900);
                    $('.mailchimp-success').fadeOut(400);
                }
            }
        });
        return false;
        //alert("Thank you for your comment!");
    });
</script>
@stack('scripts')


</body>

</html>