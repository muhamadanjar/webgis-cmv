<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/supersized/supersized.css') }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WebGIS SIMPOSI</title>
<link type="image/png" rel="icon" href="{{ asset('images/kabbogor.png') }}">
<style type="text/css">

.rightcontent { 
  font-family: Arial;
  font-weight:100; 
  background: rgba(0,0,0,0.3);
  color: yellow;
  padding: 2rem;
  margin:2rem;
  float: right;
  font-size: 2.2rem;
}

.righcontent .narasi{
  text-align: justify;
  text-justify: inter-word;
}

.account a {
  color: #D1D1D1;
  font-size: 14px;
}
.account a:hover {
  color: #ffffff;
  text-decoration: none;
}
.account .backstretch:before {
  background-color: rgba(15, 15, 15, 0.6);
  content: "";
  height: 100%;
  position: absolute;
  width: 100%;
}
.account .form-signin {
  margin: 0 auto;
  max-width: 330px;
}
.account .form-signin .form-control:focus {
  z-index: 2;
}
.account .form-signin input[type="text"] {
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
  margin-bottom: -1px;
}
.account .form-signin input[type="password"] {
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  margin-bottom: 10px;
}
.account .account-wall {
  margin-top: 40%;
  padding: 20px 20px 10px;
  position: relative;
}
.account .login-title {
  color: #555555;
  display: block;
  font-size: 22px;
  font-weight: 400;
}
.account .profile-img {
  display: block;
  height: 96px;
  margin: 0 auto 10px;
  width: 96px;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
}
.account .select-img {
  display: block;
  height: 75px;
  margin: 0 30px 10px;
  width: 75px;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
}
.account .select-name {
  display: block;
  margin: 30px 10px 10px;
}
.account .logo-img {
  display: block;
  height: 96px;
  margin: 0 auto 10px;
  width: 96px;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
}
.account .btn.btn-lg {
  font-size: 15px;
  padding: 8px 48px 6px;
}
.account .btn.btn-lg.btn-fb {
  font-size: 15px;
  padding: 8px 48px 0px;
}
.account .user-img {
  color: #ffffff;
  display: block;
  font-size: 75px;
  left: 0;
  margin-bottom: 5px;
  margin-left: auto;
  margin-right: auto;
  position: absolute;
  right: 0;
  text-align: center;
  top: -80px;
}
.account .social-btn {
  padding-top: 50px;
}
.account .btn-block i {
  margin-top: .1em;
}
.account .form-signup {
  margin: 0 auto;
  max-width: none;
}
.account .form-signup .form-control:focus {
  z-index: 2;
}
.account .form-signup input[type="text"] {
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
  margin-bottom: -1px;
}
.account .form-signup input[type="password"] {
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  margin-bottom: 10px;
}
.account .form-signup #submit-form {
  display: block;
  margin: auto;
}
.account .form-signup .social-btn .btn {
  font-size: 15px;
  height: 35px;
  padding: 8px 20px;
}
.account .form-signup .terms {
  color: #ffffff;
  margin-bottom: 10px;
  overflow: hidden;
  padding-top: 5px;
}
.account .form-password {
  display: none;
}
.account #lockscreen-block .account-wall {
  margin-top: 240px;
  width: 1100px;
}
.account #lockscreen-block .user-image {
  float: left;
  position: relative;
  width: 25%;
}
.account #lockscreen-block .user-image img {
  border: 3px solid rgba(255, 255, 255, 0.2);
  display: block;
  float: right;
  margin-top: -10px;
  max-width: 132px;
}
.account #lockscreen-block .form-signin {
  float: left;
  padding-left: 30px;
  position: relative;
  width: 75%;
}
.account #lockscreen-block h2 {
  color: #ffffff;
  font-family: 'Lato', arial;
  font-weight: 100;
  margin-top: 0;
}
.account #lockscreen-block p {
  color: #CFCFCF;
  color: #ffffff;
}
.account #lockscreen-block .input-group .form-control {
  -webkit-border-radius: 17px 0 0 17px;
  -moz-border-radius: 17px 0 0 17px;
  border-radius: 17px 0 0 17px;
  -moz-background-clip: padding;
  -webkit-background-clip: padding-box;
  background-clip: padding-box;
}
.account #lockscreen-block .input-group .btn {
  -webkit-border-radius: 0 17px 17px 0;
  -moz-border-radius: 0 17px 17px 0;
  border-radius: 0 17px 17px 0;
  -moz-background-clip: padding;
  -webkit-background-clip: padding-box;
  background-clip: padding-box;
}
.account #lockscreen-block #loader {
  left: auto;
  margin: auto;
  position: absolute;
  right: -1px;
  top: -11px;
  width: 133px;
}

.img-center{
  margin: 0 auto;
  width: 30%;
}  

.btn-jalantol {
    background-color: #669933;
    border-color: #669933;
    color: #fff;
}
</style>

<div class="account">
  <div class="container">

    <div class="row">
        
        <!--<div class="col-sm-offset-3 col-sm-6 col-md-4 col-md-offset-4">-->
        
        <div class="col-sm-offset-3 col-sm-6">
            <div class="account-wall">

                @yield('content')
            </div>
        </div>

        
        

        
    </div>
    
  </div>
</div>

<script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('vendor/supersized/supersized.3.2.7.min.js')}}"></script>


<script type="text/javascript">
      
  $(function($){
        
      $.supersized({
          fit_always:0,
          fit_portrait: 1,
          fit_landscape: 1,
          slides  :   [ 
            {
              image : '{{ url("images/slider/LOGIN_1_1.jpg")}}', 
              title : 'Image Credit: Maria Kazvan'
            },
            {
              image : '{{ url("images/slider/LOGIN_2_1.jpg")}}', 
              title : 'Image Credit: Maria Kazvan'
            }
          ]
      });
  });
        
</script>