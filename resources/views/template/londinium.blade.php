<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
<link rel="icon" href="{{ config('global.icon') }}" type="image/png" sizes="16x16">
<title>{{ config('global.siteTitle') }}</title>

@include('template.londinium-css')
@include('template.londinium-script')

</head>
	
<body class="navbar-fixed">

	<!-- Navbar -->

	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="navbar-header">
			<a class="navbar-brand" href="#"><img src="{{ asset('images/logo_webgis.png')}}" alt="Administrator"></a>
			<a class="sidebar-toggle"><i class="icon-paragraph-justify2"></i></a>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-icons">
				<span class="sr-only">Toggle navbar</span>
				<i class="icon-grid3"></i>
			</button>
			<button type="button" class="navbar-toggle offcanvas">
				<span class="sr-only">Toggle navigation</span>
				<i class="icon-paragraph-justify2"></i>
			</button>
		</div>
		@if(\Auth::check())
		<ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-people"></i>
					<span class="label label-default">2</span>
				</a>
				<div class="popup dropdown-menu dropdown-menu-right">
					<div class="popup-header">
						<a href="#" class="pull-left"><i class="icon-spinner7"></i></a>
						<span>Activity</span>
						<a href="#" class="pull-right"><i class="icon-paragraph-justify"></i></a>
					</div>
	                <ul class="activity">
		                <li>
		                	<i class="icon-cart-checkout text-success"></i>
		                	<div>
			                	<a href="#">Eugene</a> ordered 2 copies of <a href="#">OEM license</a>
			                	<span>14 minutes ago</span>
		                	</div>
		                </li>
		                <li>
		                	<i class="icon-heart text-danger"></i>
		                	<div>
			                	Your <a href="#">latest post</a> was liked by <a href="#">Audrey Mall</a>
			                	<span>35 minutes ago</span>
		                	</div>
		                </li>
		                <li>
		                	<i class="icon-checkmark3 text-success"></i>
		                	<div>
			                	Mail server was updated. See <a href="#">changelog</a>
			                	<span>About 2 hours ago</span>
		                	</div>
		                </li>
		                <li>
		                	<i class="icon-paragraph-justify2 text-warning"></i>
		                	<div>
			                	There are <a href="#">6 new tasks</a> waiting for you. Don't forget!
			                	<span>About 3 hours ago</span>
		                	</div>
		                </li>
	                </ul>
                </div>
			</li>

			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-paragraph-justify2"></i>
					<span class="label label-default">6</span>
				</a>
				<div class="popup dropdown-menu dropdown-menu-right">
					<div class="popup-header">
						<a href="{{ url('admin/allmessages') }}" class="pull-left"><i class="icon-spinner7"></i></a>
						<span>Messages</span>
						<a href="#" class="pull-right"><i class="icon-new-tab"></i></a>
					</div>
					<ul class="popup-messages">
						<li class="unread">
							<a href="#">
								<img src="{{$foto_300}}" alt="" class="user-face">
								<strong>Eugene Kopyov <i class="icon-attachment2"></i></strong>
								<span>Aliquam interdum convallis massa...</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="{{$foto_300}}" alt="" class="user-face">
								<strong>Jason Goldsmith <i class="icon-attachment2"></i></strong>
								<span>Aliquam interdum convallis massa...</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="http://placehold.it/300" alt="" class="user-face">
								<strong>Angel Novator</strong>
								<span>Aliquam interdum convallis massa...</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="http://placehold.it/300" alt="" class="user-face">
								<strong>Monica Bloomberg</strong>
								<span>Aliquam interdum convallis massa...</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="http://placehold.it/300" alt="" class="user-face">
								<strong>Patrick Winsleur</strong>
								<span>Aliquam interdum convallis massa...</span>
							</a>
						</li>
					</ul>
				</div>
			</li>

			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle">
					<i class="icon-grid"></i>
				</a>
				<div class="popup dropdown-menu dropdown-menu-right">
					<div class="popup-header">
						<a href="#" class="pull-left"><i class="icon-spinner7"></i></a>
						<span>Tasks list</span>
						<a href="#" class="pull-right"><i class="icon-new-tab"></i></a>
					</div>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Description</th>
								<th>Category</th>
								<th class="text-center">Priority</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><span class="status status-success item-before"></span> <a href="#">Frontpage fixes</a></td>
								<td><span class="text-smaller text-semibold">Bugs</span></td>
								<td class="text-center"><span class="label label-success">87%</span></td>
							</tr>
							<tr>
								<td><span class="status status-danger item-before"></span> <a href="#">CSS compilation</a></td>
								<td><span class="text-smaller text-semibold">Bugs</span></td>
								<td class="text-center"><span class="label label-danger">18%</span></td>
							</tr>
							<tr>
								<td><span class="status status-info item-before"></span> <a href="#">Responsive layout changes</a></td>
								<td><span class="text-smaller text-semibold">Layout</span></td>
								<td class="text-center"><span class="label label-info">52%</span></td>
							</tr>
							<tr>
								<td><span class="status status-success item-before"></span> <a href="#">Add categories filter</a></td>
								<td><span class="text-smaller text-semibold">Content</span></td>
								<td class="text-center"><span class="label label-success">100%</span></td>
							</tr>
							<tr>
								<td><span class="status status-success item-before"></span> <a href="#">Media grid padding issue</a></td>
								<td><span class="text-smaller text-semibold">Bugs</span></td>
								<td class="text-center"><span class="label label-success">100%</span></td>
							</tr>
						</tbody>
					</table>
				</div>
			</li>

			<li class="user dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<img src="{{$foto_300}}" alt="">
					<span>{{ \Auth::user()->name }}</span>
					<i class="caret"></i>
				</a>
				<ul class="dropdown-menu dropdown-menu-right icons-right">
					<li><a href="{{ url('map') }}"><i class="icon-map"></i> Map</a></li>
					<li><a href="{{ url('admin/profil') }}"><i class="icon-user"></i> Profile</a></li>
					<li><a href="{{ url('admin/messages') }}"><i class="icon-bubble4"></i> Messages</a></li>
					<li><a href="{{ url('admin/setting/gantipassword') }}"><i class="icon-info"></i> Change Password</a></li>
					<li><a href="{{ url('admin/logout') }}"><i class="icon-exit"></i> Logout</a></li>
				</ul>
			</li>
		</ul>
		@else
		<ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
			<li class="user">
				<a href="{{ url('admin/login')}}"><i class="icon-user"></i><span>Login</span></a>
		    </li>
		</ul>
		@endif
	</div>
	<!-- /navbar -->
	<?php
	$status = (isset($status_login)) ? 1 : 0;
	?>
	<!-- Page container -->
 	<div class="page-container">
		<!-- Sidebar -->
		@include('template.londinium-sidebar')
		<!-- /sidebar -->
		@if($status == 1)
			@yield('content')
		@else
		<!-- Page content -->
	 	<div class="page-content">
			<!-- Page header -->
			
			@yield('page-header')
			<!-- /page header -->

			<!-- Breadcrumbs line -->
			
			@yield('breadcrumb')
			<!-- /breadcrumbs line -->
			@if (count($errors) > 0)
				<div class="callout callout-danger fade in">
					<button data-dismiss="alert" class="close" type="button">×</button>
					<h5><strong>Whoops!</strong> Ada beberapa masalah dengan apa yang Anda input.</h5>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			@if(Session::has('message'))
		        {!! Session::get('message') !!}
			@endif

			@if (Session::has('status'))
				<div class="alert alert-info">{{ Session::get('status') }}</div>
			@endif
			<!-- Callout -->
			@yield('callout')
            <!-- /callout -->

           	@yield('content')

	        <!-- Footer -->
	        @yield('footer')
	        <!-- /footer -->

			@include('vendor.modal')
			
		</div>
		<!-- /page content -->
		@endif

		
		

	</div>
	<!-- /content -->
	@yield('js_tambahan')
	
	<script type="text/javascript" src="{{ asset('simposi.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/application.js')}}"></script>
</body>


</html>