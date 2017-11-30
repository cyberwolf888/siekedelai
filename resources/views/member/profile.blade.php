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
                        <li><a href="#">Member</a></li>
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
            @if (session('success'))
            <div class="notification success closeable">
                <p><span>Success!</span> Your profile has been save.</p>
                <a class="close"></a>
            </div>
            @endif
            @if (count($errors) > 0)
                <div class="notification error closeable">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <a class="close"></a>
                </div>
            @endif
            <form method="post" class="register" action="{{ route('member.save_profile') }}">
                {{ csrf_field() }}
                <p class="form-row form-row-wide">
                    <label for="name">Full Name: <span class="required">*</span></label>
                    <input type="text" class="input-text" name="name" id="name" value="{{ $model->name }}" required autofocus />
                    @if ($errors->has('name'))
                        <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                    @endif
                </p>

                <p class="form-row form-row-wide">
                    <label for="email">Email Address: <span class="required">*</span></label>
                    <input type="email" class="input-text" name="email" id="email" value="{{ $model->email  }}" required />
                    @if ($errors->has('email'))
                        <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                    @endif
                </p>


                <p class="form-row form-row-wide">
                    <label for="password">Password: <span class="required">*</span></label>
                    <input type="password" class="input-text" name="password" id="password"  />
                    @if ($errors->has('password'))
                        <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                    @endif
                </p>

                <p class="form-row form-row-wide">
                    <label for="password_confirmation">Repeat Password: <span class="required">*</span></label>
                    <input type="password" class="input-text" name="password_confirmation" id="password_confirmation"  />
                </p>

                <p class="form-row form-row-wide">
                    <label for="phone">Phone Number: <span class="required">*</span></label>
                    <input type="text" class="input-text" name="phone" id="phone" value="{{ $model->phone  }}" required autofocus />
                    @if ($errors->has('phone'))
                        <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                    @endif
                </p>

                <p class="form-row form-row-wide">
                    <label for="address">Address: <span class="required">*</span></label>
                    <input type="text" class="input-text" name="address" id="address" value="{{ $model->address  }}" required autofocus />
                    @if ($errors->has('address'))
                        <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                    @endif
                </p>


                <p class="form-row">
                    <input type="submit" class="button" name="register" value="Save" />
                </p>

            </form>
        </div>
    </div>

    <div class="margin-top-50"></div>
@endsection
