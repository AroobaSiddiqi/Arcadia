@extends('layouts.mainlayout')

@section('content')


 <!-- ======= Hero Section ======= -->
 <section id="hero" class="hero d-flex align-items-center">

<div class="container" style="background: url(../img/bbg.png) top center no-repeat;">
  <div class="row">
    <div class="col-lg-6 d-flex flex-column justify-content-center">
    @if($product->stock==0)
    <span style="text-align:center; font-family: 'EB Garamond', sans-serif;font-size:30px;font-weight: 400;letter-spacing:1px;color: #017045;">Sorry! The product is out of stock</span>
        <a href="{{ url('allProducts') }}" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
            <span>View More Products</span>
            <i class="bi bi-arrow-right"></i>
          </a>
    @else
    <form method="GET" action="{{ url('viewCart', ['id' => $product->product_id]) }}">
    @csrf
      <h2 data-aos="fade-up" data-aos-delay="400">{{$product->category}} Collection</h2>
      <h1 data-aos="fade-up">{{ $product->name }}</h1>
      <p class="productParagraph">
        {{ $product->description}}
      </p>
         <h2>Quantity </h2> <input type="number" name="quantity" value="1">
         <h2>Price: Rs{{$product->price}}/-</h2>
         <h2>In stock: {{ $product->stock }} </h2>
      @auth
      <div data-aos="fade-up" data-aos-delay="300">
        <div class="text-center text-lg-start">
          <input type="submit" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center" value="Add to Cart">
        </div>
      </div>
      @else
      <div style="text-align:left;">
   <span style="text-align:left; font-family: 'EB Garamond', sans-serif;font-size:30px;font-weight: 400;letter-spacing:1px;color: red;">You must be logged in to make a purchase</span>
   </div>
      @endauth

  </form>                       
    </div>
    <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
      <img src="{{asset($product->img)}}" class="img-fluid" alt="">
 @endif


    </div>
  </div>
</div>

</section><!-- End Hero -->
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

