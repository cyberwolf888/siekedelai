@extends('layouts.frontend')

@section('content')
    <!-- Titlebar
================================================== -->
    <section class="titlebar">
        <div class="container">
            <div class="sixteen columns">
                <h2>Shop Best Seller</h2>

                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Best Seller</li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
@endpush