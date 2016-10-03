<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
<style type="text/css">
	/*body {
    margin: 0;
    background: #000; 
  }*/
video { 
    position: fixed;
    top: 50%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: -100;
    transform: translateX(-50%) translateY(-50%);
    background: url('{{ url("images/bg_poster_video.png") }}') no-repeat;
    background-size: cover;
    transition: 1s opacity;
}
.stopfade { 
   opacity: .5;
}

#polina { 
  /*font-family: Agenda-Light, Agenda Light, Agenda, Arial Narrow, sans-serif;*/
  font-weight:100; 
  background: rgba(0,0,0,0.3);
  color: yellow;
  padding: 2rem;
  width: 40%;
  margin:2rem;
  float: right;
  font-size: 1.2rem;
}
#polina button { 
  display: block;
  width: 80%;
  padding: .4rem;
  border: none; 
  margin: 1rem auto; 
  font-size: 1.3rem;
  background: rgba(255,255,255,0.23);
  color: yellow;
  border-radius: 3px; 
  cursor: pointer;
  transition: .3s background;
}
#polina button:hover { 
   background: rgba(0,0,0,0.5);
   text-decoration:none;
}

#polina p.narasiputih{ 
  /*font-family: Agenda-Light, Agenda Light, Agenda, Arial Narrow, sans-serif;*/
  color:white;
}

#polina p.develop{ 
  /*font-family: Agenda-Light, Agenda Light, Agenda, Arial Narrow, sans-serif;*/
  color:white;
  font-size: 7pt;
}

.navbar-default {
    background-color: #000000;
    border-color: #e7e7e7;
}

.navbar-default .navbar-nav>li>a {
    color: #fff;
}
/*h1 {
  font-size: 3rem;
  text-transform: uppercase;
  margin-top: 0;
  letter-spacing: .3rem;
}
#polina button { 
  display: block;
  width: 80%;
  padding: .4rem;
  border: none; 
  margin: 1rem auto; 
  font-size: 1.3rem;
  background: rgba(255,255,255,0.23);
  color: #fff;
  border-radius: 3px; 
  cursor: pointer;
  transition: .3s background;
}
#polina button:hover { 
   background: rgba(0,0,0,0.5);
}

a {
  display: inline-block;
  color: #fff;
  text-decoration: none;
  background:rgba(0,0,0,0.5);
  padding: .5rem;
  transition: .6s background; 
}
a:hover{
  background:rgba(0,0,0,0.9);
}
@media screen and (max-width: 500px) { 
  div{width:70%;} 
}
@media screen and (max-device-width: 800px) {
  html { background: url(//demosthenes.info/assets/images/polina.jpg) #000 no-repeat center center fixed; }
  #bgvid { display: none; }
}*/
</style>

<nav role="navigation" class="navbar navbar-default navbar-fixed-top topnav">
    <div class="container topnav">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                  <button data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="navbar-toggle" type="button">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
                  <ul class="nav navbar-nav navbar-right">
                      <li>
                          <a href="#services">Pemerintah Kota Bogor - 2016</a>
                      </li>
                      
                  </ul>
              </div>
              <!-- /.navbar-collapse -->
          </div>
          <!-- /.container -->
</nav>
<video autoplay  poster="{{ url('images/bg_poster_video.png') }}" id="bgvid" loop>
  <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
  <!--<source src="//demosthenes.info/assets/videos/polina.webm" type="video/webm">-->
  
  <source src="{{ url('video/TUGU_KUJANG_SSA.mp4')}}" type="video/mp4">

</video>
<div id="polina">
  <h3>BOGOR TRANSPORTATION MAP – BTM</h3>
  <div class="col-md-2"><img class="img-responsive" src="{{ asset('images/kotabogor.png') }}"></div>
  
  <!-- Narasi-->
  <div class="col-md-10">
    <p class="narasiputih">Aplikasi yang dikembangkan untuk memudahkan para pengguna jasa transportasi publik 
    memperoleh informasi  rute transportasi publik di Kota Bogor yang telah disesuaikan dengan 
    pelaksanaan SISTEM SATU ARAH (SSA) oleh Pemerintah Kota Bogor.<br>
    Dalam aplikasi ini terdapat informasi rute pelayanan angkutan umum , sebaran fasilitas 
    publik, dan pemilihan rute tercepat bagi pengguna jalan di Kota Bogor. Pembaharuan 
    informasi akan terus dilakukan oleh Pemerintah Kota Bogor dan para pihak yang terkait.</p>
  </div>

  <p align="right" class="develop">Developed @RSMM2016</p>
  <!--<button>Pause</button>-->
  <a class="" href="{{ url('map') }}"><button>Masuk</button></a>
</div>


<script type="text/javascript">
	
	var vid = document.getElementById("bgvid");
	var pauseButton = document.querySelector("#polina button");

	function vidFade() {
	  vid.classList.add("stopfade");
	}

	vid.addEventListener('ended', function()
	{
	// only functional if "loop" is removed 
	vid.pause();
	// to capture IE10
	vidFade();
	}); 


	/*pauseButton.addEventListener("click", function() {
	  vid.classList.toggle("stopfade");
	  if (vid.paused) {
	    vid.play();
	    pauseButton.innerHTML = "Pause";
	  } else {
	    vid.pause();
	    pauseButton.innerHTML = "Paused";
	  }
	})*/


</script>