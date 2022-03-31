@extends('layout')
@section('content')
<div class="login-register-area pt-95 pb-100">
            <div class="container">
                <div class="row">

                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <h4> REGISTER </h4>
                            </div>
                            <div class="tab-content">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form method="post" action="/register" >
                                            @csrf

                                            <input type="text" name="u_name" id="u_name" placeholder="Name" value="{{ old('u_name') }}" required>
                                            @error('u_name')
                                            <p>{{ $message }}</p>
                                            @enderror

                                            <input type="email" name="u_email" id="u_email" placeholder="Email" value="{{ old('u_email') }}"  required >
                                            @error('u_email')
                                            <p>{{ $message }}</p>
                                            @enderror

                                            <input type="password" name="u_password" id="u_password" placeholder="Password" value="{{ old('u_password') }}" required>
                                            @error('u_password')
                                            <p>{{ $message }}</p>
                                            @enderror

                                            <input type="text" name="u_phone" id="u_phone" placeholder="Phone" value="{{ old('u_phone') }}" required>
                                             @error('u_phone')
                                            <p>{{ $message }}</p>
                                            @enderror
                                            
                                            <div class="button-box">
                                                <button type="submit"><span>Register</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
                   
