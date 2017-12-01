@extends('layouts.frontend')

@push('plugin_css')
@endpush

@section('content')
    <!-- Titlebar
================================================== -->
    <section class="titlebar">
        <div class="container">
            <div class="sixteen columns">
                <h2>Payment</h2>

                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Member</a></li>
                        <li>Payment</li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>


    <!-- Container -->
    <div class="container">

        <div class="eight columns">

            <!-- Billing Details Content -->
            <div class="checkout-section active"><span>1</span> Payment</div>
            <div class="checkout-content">
                <p>Silakan lakukan transfer bank ke salah satu rekening yang tersedia dibawah ini:</p>

                <h3>Bank BCA</h3>
                <span>89938388393</span><br>
                <span>A/n Bedebah</span>
                <br><br>
                <h3>Bank Mandiri</h3>
                <span>89938388393</span><br>
                <span>A/n Bedebah</span>

            </div>
            <div class="clearfix"></div>
            <div class="checkout-section active"><span>2</span> Bukti Pembayaran</div>
            <div class="checkout-content">
                <form method="post" action="{{ route('member.payment_proses',$model->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="fullwidth">
                        <label>Image Bukti Pembayaran: <abbr>*</abbr></label>
                        <input type="file" placeholder="" name="image" required />
                    </div>
                    <input type="submit" class="continue button color" name="continue" value="Continue" />
                </form>
            </div>

        </div>
        <!-- Billing Details / Enc -->


        <!-- Checkout Cart -->
        <div class="eight columns">
            <div class="checkout-section cart">Detail Transaction</div>
            <!-- Cart -->
            <table class="checkout cart-table responsive-table">

                <tr>
                    <th class="hide-on-mobile">Item</th>
                    <th></th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>

                @foreach($model->transaction_detail as $cart)
                    <tr>
                        <td class="hide-on-mobile"><img src="{{ $cart->product->getImageThumb() }}" style="width: 65px; height: 70px;" alt=""/></td>
                        <td class="cart-title"><a href="#">{{ $cart->product->name }}</a></td>
                        <td>IDR {{ number_format($cart->price,0,',','.') }}</td>
                        <td class="qty-checkout">{{ $cart->qty }}</td>
                        <td class="cart-total">IDR {{ number_format($cart->total,0,',','.') }}</td>
                    </tr>
                @endforeach


            </table>

            <!-- Apply Coupon Code / Buttons -->
            <table class="cart-table bottom">

                <tr>
                    <th class="checkout-totals">
                        <div class="checkout-subtotal">
                            Subtotal: <span>IDR {{ number_format($model->sub_total,0,',','.') }}</span>
                        </div><br>
                        <div class="checkout-subtotal">Shipping & Handling: <span>IDR {{ number_format($model->shipping,0,',','.') }}</span></div><br>
                        <div class="checkout-subtotal summary">Order Total: <span>IDR {{ number_format($model->total,0,',','.') }}</span></div>
                    </th>
                </tr>

            </table>
        </div>
        <!-- Checkout Cart / End -->


    </div>
    <!-- Container / End -->

    <div class="margin-top-50"></div>
@endsection

@push('plugin_scripts')
@endpush