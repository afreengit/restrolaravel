@extends('layout')
@section('content')
@if (session()->has('success'))
<p>{{ session()->get('success') }}</p>
@endif
        <div class="shop-page-area pt-100 pb-100">
            <div class="container">
                <div class="row flex-row-reverse">
                    <!-- banner area begins -->
                    <div class="col-lg-9">
                        <div class="banner-area pb-30">
                            <a href="product-details.html"><img alt="" src="assets/img/banner/banner-49.jpg"></a>
                        </div>
                    </div>
                    <!-- banner area ends -->
@endsection
                   
