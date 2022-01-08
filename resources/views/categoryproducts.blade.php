@extends('layouts.mainlayout')

@section('content')

<!-- ======= All Products Section ======= -->
<section id="pricing" class="pricing">

<div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>All Products</h2>
          <p>Check our latest work</p>
        </header>

        @if($products->isEmpty())
          <div style="text-align:center;">
   <span style="text-align:center; font-family: 'EB Garamond', sans-serif;font-size:30px;font-weight: 400;letter-spacing:1px;color: red;">No products to show</span>
   </div>
        
        @else

        <div style="display:grid; grid: auto / auto auto auto ;width:100%;">

       @foreach($products as $product)

      <div class="box" style="margin: 40px; ">
        <h3 style="color: #2c8f60;">{{$product->name}}</h3>
        <div class="price"><sup>Rs</sup>{{$product->price}}</div>
        <img src="{{ asset($product->img) }}" class="img-fluid" alt="">
        <a href="{{ url('product',['id' => $product->product_id]) }}" class="btn-buy">Buy Now</a>
      </div>
         @endforeach
</div>
@endif
</div>

</section><!-- End Pricing Section -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('vendor/purecounter/purecounter.js')}}"></script>
<script src="{{asset('vendor/aos/aos.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('js/main.js')}}"></script>
@endsection

