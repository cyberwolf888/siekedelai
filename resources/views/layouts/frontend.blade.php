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

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ url('assets/frontend') }}/css/style.css">
    <link rel="stylesheet" href="{{ url('assets/frontend') }}/css/colors/green.css" id="colors">

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
                <h1><a href="{{ route('home') }}"><img src="{{ url('assets/frontend') }}/images/logo.png" alt="Trizzy" /></a></h1>
            </div>
        </div>


        <!-- Additional Menu -->
        <div class="twelve columns">
            <div id="additional-menu">
                <ul>
                    <li><a href="shopping-cart.html">Shopping Cart</a></li>
                    <li><a href="checkout-billing-details.html">Checkout</a></li>
                    @if(Auth::check())
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
                    <a href="#" class="button adc">$178.00</a>
                </div>

                <div class="cart-list">

                    <div class="arrow"></div>

                    <div class="cart-amount">
                        <span>2 items in the shopping cart</span>
                    </div>

                    <ul>
                        <li>
                            <a href="#"><img src="{{ url('assets/frontend') }}/images/small_product_list_08.jpg" alt="" /></a>
                            <a href="#">Converse All Star Trainers</a>
                            <span>1 x $79.00</span>
                            <div class="clearfix"></div>
                        </li>

                        <li>
                            <a href="#"><img src="{{ url('assets/frontend') }}/images/small_product_list_09.jpg" alt="" /></a>
                            <a href="#">Tommy Hilfiger <br /> Shirt Beat</a>
                            <span>1 x $99.00</span>
                            <div class="clearfix"></div>
                        </li>
                    </ul>

                    <div class="cart-buttons button">
                        <a href="shopping-cart.html" class="view-cart" ><span data-hover="View Cart"><span>View Cart</span></span></a>
                        <a href="checkout-billing-details.html" class="checkout"><span data-hover="Checkout">Checkout</span></a>
                    </div>
                    <div class="clearfix">

                    </div>
                </div>

            </div>

            <!-- Search -->
            <nav class="top-search">
                <form action="#" method="get">
                    <button><i class="fa fa-search"></i></button>
                    <input class="search-field" type="text" placeholder="Search" value=""/>
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
                        <a href="#">Local</a>
                    </li>
                    <li class="demo-button">
                        <a href="#">Impor</a>
                    </li>
                    <li class="demo-button">
                        <a href="#">Best Seller</a>
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
                <img src="{{ url('assets/frontend') }}/images/logo-footer.png" alt="" class="margin-top-10"/>
                <p class="margin-top-15">Nulla facilisis feugiat magna, ut molestie metus hendrerit vitae. Vivamus tristique lectus at varius rutrum. Integer lobortis mauris non consectetur eleifend.</p>
            </div>

            <div class="four columns">

                <!-- Headline -->
                <h3 class="headline footer">Customer Service</h3>
                <span class="line"></span>
                <div class="clearfix"></div>

                <ul class="footer-links">
                    <li><a href="#">Order Status</a></li>
                    <li><a href="#">Payment Methods</a></li>
                    <li><a href="#">Delivery & Returns</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                </ul>

            </div>

            <div class="four columns">

                <!-- Headline -->
                <h3 class="headline footer">My Account</h3>
                <span class="line"></span>
                <div class="clearfix"></div>

                <ul class="footer-links">
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">Order History</a></li>
                    <li><a href="#">Wish List</a></li>
                </ul>

            </div>

            <div class="four columns">

                <!-- Headline -->
                <h3 class="headline footer">Newsletter</h3>
                <span class="line"></span>
                <div class="clearfix"></div>
                <p>Sign up to receive email updates on new product announcements, gift ideas, special promotions, sales and more.</p>

                <form action="#" method="get">
                    <button class="newsletter-btn" type="submit">Join</button>
                    <input class="newsletter" type="text" placeholder="mail@example.com" value=""/>
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
@stack('plugin_scripts')
<script src="{{ url('assets/frontend') }}/scripts/custom.js"></script>
@stack('scripts')


</body>

</html>