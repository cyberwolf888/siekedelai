@extends('layouts.frontend')

@section('content')
    <!-- Titlebar
================================================== -->
    <section class="titlebar">
        <div class="container">
            <div class="sixteen columns">
                <h2>Search</h2>

                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Search</li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>

    <div class="container">

        <!-- Content
        ================================================== -->
        @if($model->count() == 0)
        <h3>Tidak ada hasil yang ditemukan</h3>
        @else
        <!-- Products -->
        <div class="products">
            @foreach ($model as $row)
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
        @endif

    </div>

    <div class="margin-top-15"></div>

@endsection

@push('scripts')
@endpush