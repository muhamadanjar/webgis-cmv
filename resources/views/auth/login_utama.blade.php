@extends('welcome_utama')
@section('content')                
                  <form class="form-signin" role="form" role="form" method="POST" action="{{ route('postlogin') }}">            
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="append-icon">
                          <input type="text" name="username" id="name" class="form-control form-white username" placeholder="Username" value="{{ old('username') }}" required>
                          <i class="icon-user"></i>
                      </div>
                      <div class="append-icon m-b-20">
                          <input type="password" name="password" class="form-control form-white password" placeholder="Password" required>
                          <i class="icon-lock"></i>
                      </div>
                      <button type="submit" id="submit-form" class="btn btn-lg btn-jalantol btn-block ladda-button" data-style="expand-left">Sign In</button>
                                 
                      <div class="clearfix">
                          <p class="pull-right m-t-20"><a><input type="checkbox" name="remember"> Remember Me</a></p>
                      </div> 
                  </form>
@endsection