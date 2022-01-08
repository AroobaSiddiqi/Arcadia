@extends('layouts.mainlayout')

@section('content')

<section class="contact">
      <div class="container">
        <div class="col-lg-6">
          <form method="get" action="{{ url('confirmorder') }}" class="php-email-form" >
            @csrf
            <div class="row gy-4">

              <h3>Contact Information</h3>

              <div class="col-md-12">
                <input type="text" class="form-control" name="contact" placeholder="Email or Phone Number" required>
              </div>

              <h3>Shipping Address</h3>

              <div class="col-md-6">
                <input type="text" class="form-control" name="fname" placeholder="First Name (optional)" >
              </div>

              <div class="col-md-6 ">
                <input type="text" class="form-control" name="lname" placeholder="Last Name" required>
              </div>

              <div class="col-md-12">
                <input type="text" class="form-control" name="address" placeholder="Address" required>
              </div>

              <div class="col-md-6">
                <input type="text" class="form-control" name="city" placeholder="City" required>
              </div>

              <div class="col-md-6">
                <input type="text" class="form-control" name="code" placeholder="Post-Code" required>
              </div>

            </div>
            <div class="text-center text-lg-start">
                <input type="submit" class="btn-get-started" value="Confirm Order" style="float:left; margin-left: 15px; margin-top:20px;">
              </div>
          </form>

        </div>
      </div>
    </section>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Template Main JS File -->
<script src="{{asset('js/main.js')}}"></script>

@endsection