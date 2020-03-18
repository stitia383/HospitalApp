@extends('layouts.app')
@section('content')

      <!-- Outer Row -->
      <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                <div class="col-lg-6">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                    </div>
                <form method="POST" action="{{route('login')}}">
                        @csrf
                        @if (session('error'))
                        <div class="alert alert-danger alert-dismissible">
                                {{ session('error') }}
                            </div>
                        @endif
                      <div class="form-group has-feedback">
                        <input type="email"  name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                        value="{{ old('email') }}" placeholder="Enter Email Address...">
                        <span class="fa fa-envelope form-control-feedback"> {{ $errors->first('email') }}</span>
                      </div>

                      <div class="form-group has-feedback">
                        <input type="password"
                        name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                         placeholder="Password">
                    <span class="fa fa-lock form-control-feedback"> {{ $errors->first('password') }}</span>

                      </div>
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                      </a>
                      <hr>
                      <a href="index.html" class="btn btn-google btn-user btn-block">
                        <i class="fab fa-google fa-fw"></i> Login with Google
                      </a>
                      <a href="index.html" class="btn btn-facebook btn-user btn-block">
                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                      </a>
                    </form>
                    <hr>
                    <div class="text-center">
                      <a class="small" href="forgot-password.html">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                      <a class="small" href="register.html">Create an Account!</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>



@endsection
