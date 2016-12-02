@extends('template.londinium')

@section('content')
<!-- Callout -->
	<div class="callout callout-info fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<h5>Selamat Datang!</h5>
		<b>{{ \Auth::user()->name }}</b>
	</div>
<!-- /callout -->

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
	<li class="bg-info">
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

</ul>
<!-- /info blocks -->

<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title"><i class="icon-file"></i> Home</h6>
			</div>
			<div class="panel-body">
				You are logged in!
			</div>
		</div>
	</div>
</div>

@endsection
