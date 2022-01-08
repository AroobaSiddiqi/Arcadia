@extends('layouts.mainlayout')

@section('content')
<section id="pricing" class="pricing">

@php
$totalamount=0;
@endphp      
  @if ($items->isEmpty())

   <div style="text-align:center;">
   <span style="text-align:center; font-family: 'EB Garamond', sans-serif;font-size:30px;font-weight: 400;letter-spacing:1px;color: #017045;">You have no items in the cart</span>
   </div>
   <div style="text-align:center;">
        <a href="{{ url('allProducts') }}" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
            <span>View More Products</span>
            <i class="bi bi-arrow-right"></i>
          </a>
   </div>
    @else
       @foreach($items as $item)
       @if ($item->quantity<=$item->stock)
          @php $totalamount+=$item->total; @endphp           

          <div class="container aos-init aos-animate" data-aos="fade-up">
  
          <div class="row gy-4 aos-init aos-animate" data-aos="fade-left">
            <div class="aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100" style="display: flex; flex-direction: row">
              <div class="box col-sm-10 " style="display: flex; flex-direction: row; justify-content: space-around;">
                <div style="display:flex ; flex-direction: row; ">
                  <img src="{{asset($item->img)}}" style="width:40%;" class="img-fluid" alt="">
                  <ul style="align-self: flex-end">
                    <h2>{{ $item->name}}</h2>
                    <h3>{{ $item->category }}</h3>
                    <li> Rs{{ $item->price }}</li>
                  </ul>
                </div>
        
                <div class="price"  style="display: flex; align-self: center;"><sup>Rs </sup><sup> {{$item->price}}</sup><sup> *</sup><sup> {{$item->quantity}}</sup><sup>  =</sup>
                {{ $item->total }} Rs</div>
              </div>  
              <div class="col-sm-1 offset-md-1" style="display: flex; align-self: center;">
                <a href="{{ url('removefrmCart', ['id' => $item->product_id]) }}" class="btn-rmv" >&#x2715;</a>
              </div>
            </div>

          </div>
        </div>
      @else
      <a href="{{ url('product',['id'=>$item->product_id])}}">
      <div class="container aos-init aos-animate" data-aos="fade-up">  
        <div class="row gy-4 aos-init aos-animate" data-aos="fade-left">
          <div class="aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100" style="display: flex; flex-direction: row">
            <div class="box col-sm-10 " style="display: flex; flex-direction: row; justify-content: space-around;">
              <div style="display:flex ; flex-direction: row; ">
                <img src="{{asset($item->img)}}" style="width:40%;" class="img-fluid" alt="">
                <ul style="align-self: flex-end">
                <h4 style="color:red">Selected quantity of {{ $item->name }} is not available!</h4>
                <h4>Available: {{$item->stock}}</h4>
                </ul>
             </div>
           </div>
           <div class="col-sm-1 offset-md-1" style="display: flex; align-self: center;">
                <a href="{{ url('removefrmCart', ['id' => $item->product_id]) }}" class="btn-rmv" >&#x2715;</a>
            </div>
         </div>
       </div>
     </div>
     </a>
    @endif
    @endforeach
<div class="container" >
    <div class="container" style="display: flex; flex-direction: row">
        <div class="container " style="display: flex; flex-direction: row; justify-content: space-around;">
          <div style="display:flex ; flex-direction: row; ">
          <ul style="align-self: flex-end">
           <h4>Total amount: <u>{{$totalamount}} Rs</u></h4> 
          <a href="{{ url('checkout') }}">Proceed to Checkout</a>
          </ul>
          </div>
        </div>
    </div>
</div>

@endif



   
      </section>

      
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