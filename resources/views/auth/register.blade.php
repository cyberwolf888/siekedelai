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
            <li class="active"><a href="{{ route('register') }}">Register</a></li>
        </ul>

        <div class="tabs-container">
            <!-- Login -->
            <div class="tab-content" id="tab1">

                <h3 class="headline">Register</h3><span class="line" style="margin-bottom:20px;"></span><div class="clearfix"></div>

                    <form method="post" class="register" action="{{ route('register') }}">
                         {{ csrf_field() }}
                        <p class="form-row form-row-wide">
                            <label for="name">Full Name: <span class="required">*</span></label>
                            <input type="text" class="input-text" name="name" id="name" value="{{ old('name') }}" required autofocus />
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </p>

                        <p class="form-row form-row-wide">
                            <label for="email">Email Address: <span class="required">*</span></label>
                            <input type="email" class="input-text" name="email" id="email" value="{{ old('email') }}" required />
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </p>

                        
                        <p class="form-row form-row-wide">
                            <label for="password">Password: <span class="required">*</span></label>
                            <input type="password" class="input-text" name="password" id="password" required />
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </p>

                        <p class="form-row form-row-wide">
                            <label for="password_confirmation">Repeat Password: <span class="required">*</span></label>
                            <input type="password" class="input-text" name="password_confirmation" id="password_confirmation" required />
                        </p>

                        <p class="form-row form-row-wide">
                            <label for="phone">Phone Number: <span class="required">*</span></label>
                            <input type="text" class="input-text" name="phone" id="phone" value="{{ old('phone') }}" required autofocus />
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </p>

                        <p class="form-row form-row-wide">
                            <label for="address">Address: <span class="required">*</span></label>
                            <input type="text" class="input-text" name="address" id="address" value="{{ old('address') }}" required autofocus />
                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </p>

                                    
                        <p class="form-row">
                            <input type="submit" class="button" name="register" value="Register" />
                        </p>
                        
                    </form>

            </div>
        </div>
    </div>
</div>

<div class="margin-top-50"></div>
@endsection
