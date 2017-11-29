@extends('layouts.frontend')

@section('content')
<!-- Titlebar
================================================== -->
<section class="titlebar">
<div class="container">
    <div class="sixteen columns">
        <h2>My Account</h2>
        
        <nav id="breadcrumbs">
            <ul>
                <li><a href="#">Home</a></li>
                <li>My Account</li>
            </ul>
        </nav>
    </div>
</div>
</section>

<!-- Content
================================================== -->

<!-- Container -->
<div class="container">

    <div class="six columns centered">

        <ul class="tabs-nav my-account">
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        </ul>

        <div class="tabs-container">
            <!-- Login -->
            <div class="tab-content" id="tab1">

                <h3 class="headline">Login</h3><span class="line" style="margin-bottom:20px;"></span><div class="clearfix"></div>

                <form method="post" class="login" action="{{ route('login') }}">
                {{ csrf_field() }}
                    
                    <p class="form-row form-row-wide">
                        <label for="username">Username or Email Address: <span class="required">*</span></label>
                        <input type="email" class="input-text" name="email" id="email" value="{{ old('email') }}" required autofocus />
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </p>

                    <p class="form-row form-row-wide">
                        <label for="password">Password: <span class="required">*</span></label>
                        <input class="input-text" type="password" name="password" id="password" />
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </p>

                    <p class="form-row">
                        <input type="submit" class="button" name="login" value="Login" />

                        <label for="rememberme" class="rememberme">
                        <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember Me</label>
                    </p>

                    
                </form>
            </div>
        </div>
    </div>
</div>

<div class="margin-top-50"></div>


@endsection
