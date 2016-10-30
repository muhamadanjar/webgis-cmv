@extends('template.londinium')
@section('page-header')
	<div class="page-header">
		<div class="page-title">
			<h3>User <small>List user</small></h3>
		</div>

		<div id="reportrange" class="range">
			<div class="visible-xs header-element-toggle">
				<a class="btn btn-primary btn-icon"><i class="icon-calendar"></i></a>
			</div>
			<div class="date-range"></div>
			<span class="label label-danger">9</span>
		</div>
	</div>
@endsection

@section('breadcrumb')
<div class="breadcrumb-line">
	<ul class="breadcrumb">
		<li><a href="index.html">Home</a></li>
		<li><a href="layout_fixed_navbar.html">Layouts</a></li>
		<li class="active">Fixed navbar</li>
	</ul>

	<div class="visible-xs breadcrumb-toggle">
		<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
	</div>

	<ul class="breadcrumb-buttons collapse">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-search3"></i> <span>Search</span> <b class="caret"></b></a>
			<div class="popup dropdown-menu dropdown-menu-right">
				<div class="popup-header">
					<a href="#" class="pull-left"><i class="icon-paragraph-justify"></i></a>
					<span>Quick search</span>
					<a href="#" class="pull-right"><i class="icon-new-tab"></i></a>
				</div>
				<form action="#" class="breadcrumb-search">
					<input type="text" placeholder="Type and hit enter..." name="search" class="form-control autocomplete">
					<div class="row">
						<div class="col-xs-6">
							<label class="radio">
								<input type="radio" name="search-option" class="styled" checked="checked">
											Everywhere
							</label>
							<label class="radio">
								<input type="radio" name="search-option" class="styled">
											Invoices
							</label>
						</div>

						<div class="col-xs-6">
							<label class="radio">
								<input type="radio" name="search-option" class="styled">
											Users
							</label>
							<label class="radio">
								<input type="radio" name="search-option" class="styled">
											Orders
							</label>
						</div>
					</div>

					<input type="submit" class="btn btn-block btn-success" value="Search">
				</form>
			</div>
		</li>

		<li class="language dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="images/flags/german.png" alt=""> <span>German</span> <b class="caret"></b></a>
						<ul class="dropdown-menu dropdown-menu-right icons-right">
							<li><a href="#"><img src="images/flags/ukrainian.png" alt=""> Ukrainian</a></li>
							<li class="active"><a href="#"><img src="images/flags/english.png" alt=""> English</a></li>
							<li><a href="#"><img src="images/flags/spanish.png" alt=""> Spanish</a></li>
							<li><a href="#"><img src="images/flags/german.png" alt=""> German</a></li>
							<li><a href="#"><img src="images/flags/hungarian.png" alt=""> Hungarian</a></li>
						</ul>
		</li>
	</ul>
</div>
@endsection
@section('content')
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<a href="{{ url('admin/user/tambah') }}" class="btn btn-success">Tambah</a>
				<div class="panel-heading"><h6 class="panel-title"><i class="icon-user"></i> Daftar User</h6></div>
				<div class="panel-body">
					<table class="table table-bordered">
						<tr>
							<th>Username</th>
							<th>Email</th>
							<th>Nama</th>
							<th>Role</th>
						</tr>
						
						@foreach($users as $key => $v)
                        <?php $class_active = ($v->isactive==0) ? 'btn-warning':'' ?>
						<tr>
							<td>{{ $v->username }}</td>
							<td>{{ $v->email }}</td>
							<td>{{ $v->name }}</td>
							<td>
								<div class="btn-group">
					                <button data-toggle="dropdown" class="btn {{ $class_active }} btn-icon dropdown-toggle" type="button"><i class="icon-cog4"></i><span class="caret"></span></button>
									<ul class="dropdown-menu icons-right dropdown-menu-right">
										<li><a href="{{ url('admin/user/ubah', ['id' => $v->id]) }}"><i class="icon-quill2"></i> Ubah</a></li>
										<li data-form="#frm-{{$v->id}}" 
											data-title="Hapus {{ $v->id }}" 
											data-message="Apa anda yakin menghapus {{ $v->username }} ?">
											<a class= "formConfirm" href="#"><i class="fa fa-bell"></i> Hapus</a>
										</li>
										<form action="{{ url('admin/user/hapus', array($v->id) ) }}" method="get" style="display:none" id="frm-{{$v->id}}"></form>
                                        <li data-form="#frmaktif-{{$v->id}}" 
											data-title="Aktif {{ $v->id }}" 
											data-message="Apa anda yakin mengaktifkan/menonaktifkan {{ $v->username }} ?">
											<a class= "formConfirm" href="#"><i class="fa fa-bell"></i> Aktif / Non Aktif</a>
										</li>
										<form action="{{ url('admin/user/aktifnonaktif', array($v->id) ) }}" method="get" style="display:none" id="frmaktif-{{$v->id}}"></form>					
									</ul>
				                </div>
							</td>
						</tr>
						@endforeach
					</table>
                    
                    *) Kuning = Non AKtif || Abu abu = Aktif
				</div>
			</div>
		</div>
	</div>
@endsection