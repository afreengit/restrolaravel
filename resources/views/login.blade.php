@extends('layout')
@section('content')@if (session()->has('message'))
<p>{{ session()->get('message') }}</p>
@endif
        <div class="login-register-area pt-95 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-toggle="tab" href="#lg1">
                                    <h4> LOGIN </h4>
                                </a>
                               
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form method="post" action="/login">
                                                <!-- <form method="post" action="{{ url('/loginform')}}"> -->
                                                @csrf
                                                @if($errors->any())
                                                <h3>{{$errors->first()}}</h3>
                                                @endif

                                                <input type="text" name="u_email" id="u_email" value="{{ old('u_email') }}" placeholder="Email id">
                                                <!-- @error('u_email')
                                                <div>{{$message}}</div>
                                                @enderror -->
                                                <input type="password" name="u_password" id="u_password" placeholder="Password" value="{{ old('u_password') }}">
                                                <!-- @error('u_password')
                                                <div>{{$message}}</div>
                                                @enderror -->

                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                        <input type="checkbox">
                                                        <label>Remember me</label>
                                                        <a href="#">Forgot Password?</a>
                                                    </div>
                                                    <button type="submit"><span>Login</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
@endsection
                   
