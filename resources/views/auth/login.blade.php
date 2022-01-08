@extends('layouts.mainlayout')

@section('content')


<!-- ======= signup Section ======= -->
<section id="login" class="signup d-flex align-items-stretch">
    
    <div style="display:inline-flex; width:50%;">
        <img style="padding:30px;" src="{{asset('img/lotion2.png')}}">
      </div>
        <div class="reply-form" style="margin:50px;"> <!--create an account form-->
          <h4 >Welcome Back!</h4>
          <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div>
                            <p>  Email:<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autofocus></p>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div>
                               <p>Password: <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" ></p>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember" style="padding:3px;">
                                        {{ __('Remember me') }}
                                    </label>
                        </div>

                                <div style="padding-top:4px;">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
</form>
</div>
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