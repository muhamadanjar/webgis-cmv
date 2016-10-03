<html>
	<head>
		<title>SSAKRB</title>
		
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('vendor/fontawesome/css/font-awesome.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/welcome.css') }}">

		<style type="text/css">
			h1{
			  /*color: #396;*/
			  	color: #FFFF00;
			  	font-weight: 100;
			  	font-size: 40px;
			  	margin: 40px 0px 20px;

			}

			#clockdiv{
			    font-family: sans-serif;
			    color: #fff;
			    display: inline-block;
			    font-weight: 100;
			    text-align: center;
			    font-size: 30px;
			}

			#clockdiv > div{
			    padding: 10px;
			    border-radius: 3px;
			    background: #00BF96;
			    display: inline-block;
			}

			#clockdiv div > span{
			    padding: 15px;
			    border-radius: 3px;
			    background: #00816A;
			    display: inline-block;
			}

			.smalltext{
			    padding-top: 5px;
			    font-size: 16px;
			}
		</style>
		<!--<script type="text/javascript">
			//###################################################################
			// Author: ricocheting.com
			// Version: v3.0
			// Date: 2014-09-05
			// Description: displays the amount of time until the "dateFuture" entered below.

			var CDown = function() {
				this.state=0;// if initialized
				this.counts=[];// array holding countdown date objects and id to print to {d:new Date(2013,11,18,18,54,36), id:"countbox1"}
				this.interval=null;// setInterval object
			}

			CDown.prototype = {
				init: function(){
					this.state=1;
					var self=this;
					this.interval=window.setInterval(function(){self.tick();}, 1000);
				},
				add: function(date,id){
					this.counts.push({d:date,id:id});
					this.tick();
					if(this.state==0) this.init();
				},
				expire: function(idxs){
					for(var x in idxs) {
						this.display(this.counts[idxs[x]], "Now!");
						this.counts.splice(idxs[x], 1);
					}
				},
				format: function(r){
					var out="";
					if(r.d != 0){out += r.d +" "+((r.d==1)?"day":"days")+", ";}
					if(r.h != 0){out += r.h +" "+((r.h==1)?"hour":"hours")+", ";}
					out += r.m +" "+((r.m==1)?"min":"mins")+", ";
					out += r.s +" "+((r.s==1)?"sec":"secs")+", ";

					return out.substr(0,out.length-2);
				},
				math: function(work){
					var	y=w=d=h=m=s=ms=0;

					ms=(""+((work%1000)+1000)).substr(1,3);
					work=Math.floor(work/1000);//kill the "milliseconds" so just secs

					y=Math.floor(work/31536000);//years (no leapyear support)
					w=Math.floor(work/604800);//weeks
					d=Math.floor(work/86400);//days
					work=work%86400;

					h=Math.floor(work/3600);//hours
					work=work%3600;

					m=Math.floor(work/60);//minutes
					work=work%60;

					s=Math.floor(work);//seconds

					return {y:y,w:w,d:d,h:h,m:m,s:s,ms:ms};
				},
				tick: function(){
					var now=(new Date()).getTime(),
						expired=[],cnt=0,amount=0;

					if(this.counts)
					for(var idx=0,n=this.counts.length; idx<n; ++idx){
						cnt=this.counts[idx];
						amount=cnt.d.getTime()-now;//calc milliseconds between dates

						// if time is already past
						if(amount<0){
							expired.push(idx);
						}
						// date is still good
						else{
							this.display(cnt, this.format(this.math(amount)));
						}
					}

					// deal with any expired
					if(expired.length>0) this.expire(expired);

					// if no active counts, stop updating
					if(this.counts.length==0) window.clearTimeout(this.interval);
					
				},
				display: function(cnt,msg){
					document.getElementById(cnt.id).innerHTML=msg;
				}
			};

			window.onload=function(){
				var cdown = new CDown();

				cdown.add(new Date(2016,3,1,11,55,57), "countbox1");
			};
		</script>-->

		<script type="text/javascript">
			
			function getTimeRemaining(endtime) {
			  var t = Date.parse(endtime) - Date.parse(new Date());
			  var seconds = Math.floor((t / 1000) % 60);
			  var minutes = Math.floor((t / 1000 / 60) % 60);
			  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
			  var days = Math.floor(t / (1000 * 60 * 60 * 24));
			  return {
			    'total': t,
			    'days': days,
			    'hours': hours,
			    'minutes': minutes,
			    'seconds': seconds
			  };
			}

			function initializeClock(id, endtime) {
			  var clock = document.getElementById(id);
			  var daysSpan = clock.querySelector('.days');
			  var hoursSpan = clock.querySelector('.hours');
			  var minutesSpan = clock.querySelector('.minutes');
			  var secondsSpan = clock.querySelector('.seconds');

			  function updateClock() {
			    var t = getTimeRemaining(endtime);

			    daysSpan.innerHTML = t.days;
			    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
			    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
			    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

			    if (t.total <= 0) {
			      clearInterval(timeinterval);
			    }
			  }

			  updateClock();
			  var timeinterval = setInterval(updateClock, 1000);
			}	
		</script>

	</head>
	<body>
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
	                        <a href="#services">Pemerintah Kota Bogor - RSMM2016</a>
	                    </li>
	                    
	                </ul>
	            </div>
	            <!-- /.navbar-collapse -->
	        </div>
	        <!-- /.container -->
	    </nav>
	    <div class="account">
			<div class="container">
				<div class="row tengah">
					<div class="col-sm-offset-3 col-sm-6 col-md-5 col-md-offset-4">
						<div class="account-wall">
							<img src="{{ asset('images/Interface-SSA_03.png') }}" width="85%"  class="img-responsive" alt="Kota Bogor">
							<div class="content">
								<!--<div class="title">Rute Angkot Kota Bogor</div>
								<div class="quote">SSAKRB</div>-->
								<h1><div id="countbox1"></div></h1>

								<h1>Sistem Satu Arah</h1>
								<!--<div id="clockdiv">
								  	<div>
								    	<span class="days"></span>
								    	<div class="smalltext">Hari</div>
								  	</div>
								  	<div>
								    	<span class="hours"></span>
								    	<div class="smalltext">Jam</div>
								  	</div>
								  	<div>
								    	<span class="minutes"></span>
								    	<div class="smalltext">Menit</div>
								  	</div>
								  	<div>
								    	<span class="seconds"></span>
								    	<div class="smalltext">Detik</div>
								  	</div>
								</div>-->
								
							</div>
							<br>
							<div class="col-sm-3 col-md-3 col-md-offset-4"><div id="btnContain"><a href="{{ url('/map')}}" class="btn btn-success">Masuk</a></div></div>
								
						</div>
					</div>
				</div>
				
				
			</div>
		</div>

	</body>
</html>

<!--<script type="text/javascript">
	
	var deadline = new Date("2016-04-01");
	if(new Date() > deadline){
		alert('Udah deadline broh');
		a = document.createElement("a");
		a.setAttribute('class', 'btn btn-success');
		a.textContent = "Masuk";
		document.getElementById('btnContain').appendChild(a);
	}else{
		initializeClock('clockdiv', deadline);
		a = document.createElement("a");
		a.setAttribute('class', 'btn btn-success disabled');
		
		i = document.createElement("i");
		i.setAttribute('class','fa fa-bus');
		//a.appendChild(i);
		a.textContent += "Masuk";
		document.getElementById('btnContain').appendChild(a);	
	}
	
			
			
</script>-->