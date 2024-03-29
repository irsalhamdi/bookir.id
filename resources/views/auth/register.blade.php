@extends('frontend.main_master')

@section('content')

    <div class="breadcrumb">
	    <div class="container">
		    <div class="breadcrumb-inner">
			    <ul class="list-inline list-unstyled">
				    <li>
                        <a href="">Home</a>
                    </li>
				    <li class='active'>
                        <a href="{{ route('register') }}">Register</a> 
                    </li>
			    </ul>
		    </div>
	    </div>
    </div>

    <div class="body-content">
	    <div class="container">
		    <div class="sign-in-page">
			    <div class="row">	
                    <div class="col-md-6 col-sm-6 sign-in">
	                    <h4 class="">Sign in</h4>
	                    <p class="">Hello, Welcome to your account.</p>
	                    <div class="social-sign-in outer-top-xs">
		                    <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
		                    <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
	                    </div>
	                    <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
                            @csrf
		                    <div class="form-group">
		                        <label class="info-title" for="exampleInputEmail1">Email Address</label>
		                        <input type="email" name="email" id="email" class="form-control unicase-form-control text-input">
		                    </div>
	  	                    <div class="form-group">
	                            <label class="info-title" for="exampleInputPassword1">Password</label>
	                            <input type="password" name="password" class="form-control unicase-form-control text-input" id="password" >
		                    </div>
		                    <div class="radio outer-xs">
		  	                    <label>
		                            <input type="radio" name="optionsRadios" id="optionsRadios2"    value="option2">Remember me!
		                        </label>
	  	                        <a href="{{ route('password.request') }}" class="forgot-password pull-right">
                                      Forgot your Password?
                                </a>
		                    </div>
	  	                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
	                    </form>					
                    </div>
                    <div class="col-md-6 col-sm-6 create-new-account">
	                    <h4 class="checkout-subtitle">Create a new account</h4>
	                    <p class="text title-tag-line">Create your new account.</p>
	                    <form methos="POST" action="{{ route('register') }}">
							<div class="form-group">
		                        <label class="info-title" for="exampleInputEmail1">
									Name
								</label>
		                        <input type="text" name="name" class="form-control unicase-form-control text-input" id="name" >
								@error('name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
		                    </div>
		                    <div class="form-group">
	    	                    <label class="info-title" for="exampleInputEmail2">
									Email Address
								</label>
	    	                    <input type="email" name="email" class="form-control unicase-form-control text-input" id="email" >
								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
	  	                    </div>
                            <div class="form-group">
		                        <label class="info-title" for="exampleInputEmail1">
									Phone
								</label>
		                        <input type="text" name="phone" class="form-control unicase-form-control text-input" id="phone" >
								@error('phone')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
		                    </div>
                            <div class="form-group">
		                        <label class="info-title" for="exampleInputEmail1">
									Password
								</label>
		                        <input type="password" name="password" class="form-control unicase-form-control text-input" id="password" >
								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
		                    </div>
                            <div class="form-group">
		                        <label class="info-title" for="exampleInputEmail1">
									Confirm Password
								</label>
		                        <input type="password" name="password_confirmation" class="form-control unicase-form-control text-input" id="password_confirmation" >
								@error('password_confirmation')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
		                    </div>
	  	                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
	                    </form>
                    </div>
                </div>
		    </div>
        </div>
    </div>
    
@endsection