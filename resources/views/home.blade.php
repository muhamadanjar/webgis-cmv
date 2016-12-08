@extends('template.londinium')

@section('page-header')
<div class="page-header">
	<div class="page-title">
		<h3>Home <small>Tamu</small></h3>
	</div>

	<div id="reportrange" class="range">
		<div class="visible-xs header-element-toggle">
			<a class="btn btn-primary btn-icon"><i class="icon-calendar"></i></a>
		</div>
	</div>
</div>
@endsection

@section('breadcrumb')
<div class="breadcrumb-line">
	<ul class="breadcrumb">
		<li><a href="index.html">Home</a></li>
		<li class="active">Dashboard</li>
	</ul>
	<div class="visible-xs breadcrumb-toggle">
		<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
	</div>		
</div>
@endsection

@section('content')

@if(\Auth::check())
<!-- Callout -->
	<div class="callout callout-info fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<h5>Selamat Datang!</h5>
		<b>{{ \Auth::user()->name }}</b>
	</div>
<!-- /callout -->
@endif
<!-- Info blocks -->
<ul class="info-blocks">
	@if(isset($useronline))
	<li class="bg-primary">
		<div class="top-info">
			<a href="#">User</a>
			<small>Online</small>
		</div>
		<a href="{{ url('admin/user') }}"><i class="icon-user"></i></a>
		<span class="bottom-info bg-danger">{{$useronline}} user yang sedang online</span>
	</li>
	@endif

	@if(isset($pengunjungonline))
	<li class="bg-danger">
		<div class="top-info">
			<a href="#">Pengunjung</a>
			<small>Online</small>
		</div>
		<a href="{{ url('admin/setting/statistiklist') }}"><i class="icon-stats2"></i></a>
		<span class="bottom-info bg-primary"> {{$pengunjungonline}} orang yang membuka situs</span>
	</li>
	@endif

	@if(isset($message))
	<li class="bg-info">
		<div class="top-info">
			<a href="#">Pengunjung</a>
			<small>Online</small>
		</div>
		<a href="{{ url('admin/setting/statistiklist') }}"><i class="icon-bubbles3"></i></a>
		<span class="bottom-info bg-primary"> {{$message}} orang yang membuka situs</span>
	</li>
	@endif

	<li class="bg-info">
		<div class="top-info">
			<a href="#">Pesan</a>
			<small>histori pesan</small>
		</div>
		<a href="#"><i class="icon-bubbles3"></i></a>
		<span class="bottom-info bg-primary">{{$pesanbelumdibaca}} Belum dibaca</span>
	</li>

</ul>
<!-- /info blocks -->

<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title"><i class="icon-file"></i> Home</h6>
			</div>
			<div class="panel-body">
				----
			</div>
		</div>
	</div>
</div>

<!-- Newest team members -->
<h6><i class="icon-people"></i> New team members</h6>
<div class="row">
	<div class="col-lg-3 col-md-6 col-sm-6">
		<div class="block">
			<div class="thumbnail">
				<a href="#" class="thumb-zoom lightbox" title="Eugene A. Kopyov">
					<img src="http://placehold.it/300">
				</a>
						
				<div class="caption text-center">
					<h6>Eugene A. Kopyov <small>UX designer</small></h6>
				    	<div class="icons-group">
			                <a href="#" title="Google Drive" class="tip"><i class="icon-google-drive"></i></a>
			                <a href="#" title="Twitter" class="tip"><i class="icon-twitter"></i></a>
			                <a href="#" title="Github" class="tip"><i class="icon-github3"></i></a>
		                </div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-3 col-md-6 col-sm-6">
		<div class="block">
			<div class="thumbnail">
				<a href="#" class="thumb-zoom lightbox" title="Sophia R. McJamer">
					<img src="http://placehold.it/300">
				</a>
					    
				<div class="caption text-center">
					<h6>Sophia R. McJamer <small>Media designer</small></h6>
				    	<div class="icons-group">
			                <a href="#" title="Google Drive" class="tip"><i class="icon-google-drive"></i></a>
			                <a href="#" title="Twitter" class="tip"><i class="icon-twitter"></i></a>
			                <a href="#" title="Github" class="tip"><i class="icon-github3"></i></a>
		                </div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-3 col-md-6 col-sm-6">
		<div class="block">
			<div class="thumbnail">
				<a href="#" class="thumb-zoom lightbox" title="Noah Kennedy">
					<img src="http://placehold.it/300">
				</a>
					    
				<div class="caption text-center">
					<h6>Noah Kennedy <small>CEO &amp; founder</small></h6>
				    	<div class="icons-group">
			                <a href="#" title="Google Drive" class="tip"><i class="icon-google-drive"></i></a>
			            	<a href="#" title="Twitter" class="tip"><i class="icon-twitter"></i></a>
			                <a href="#" title="Github" class="tip"><i class="icon-github3"></i></a>
		                </div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-3 col-md-6 col-sm-6">
		<div class="block">
			<div class="thumbnail">
				<a href="#" class="thumb-zoom lightbox" title="Noah Kennedy">
					<img src="http://placehold.it/300">
				</a>
					    
				<div class="caption text-center">
					<h6>Noah Kennedy <small>CEO &amp; founder</small></h6>
				    	<div class="icons-group">
			                <a href="#" title="Google Drive" class="tip"><i class="icon-google-drive"></i></a>
			            	<a href="#" title="Twitter" class="tip"><i class="icon-twitter"></i></a>
			                <a href="#" title="Github" class="tip"><i class="icon-github3"></i></a>
		                </div>
				</div>
			</div>
		</div>
	</div>
</div>
	

	
<!-- /newest team members -->

@endsection
