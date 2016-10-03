@extends('app')

@section('content')

<?php
$id = '';
$username = '';
$name = '';
$email = '';
$password = '';


if ($status == 'edit') {
	$id = $users->id;
	$username = $users->username;
	$name = $users->name;
	$email = $users->email;
	$password = $users->password;
	$oldpassword = $users->password;
	$nik = $users->nik;
}

?>
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Tambah User</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/user/add-edit') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="status" value="{{ $status }}">
						
						@if($status =='edit')
						<input type="hidden" name="id" value="{{ $id }}">

						@endif
						
						<div class="form-group">
							<label class="col-md-2 control-label">Username</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="username" value="{{ $username }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">Nama Lengkap</label>
							<div class="col-md-6">
								<input  class="form-control" name="name" type="text" value="{{ $name }}">
								
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">Email</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="email" value="{{ $email}}">
							</div>
						</div>
						
						@if($status == 'edit')
						
						<input type="hidden" class="form-control" name="oldpassword" value="{{ $password }}">
							
						@endif

						<div class="form-group">
							<label class="col-md-2 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password" value="{{ $password }}">
							</div>
						</div>
                      
                        
						<div class="form-group">
							<label class="col-md-2 control-label">Lvel</label>
							<div class="col-md-2">
								<select name="level" class="form-control">
									<option value="2">Operator</option>
								</select>
								
							</div>
						</div>
                        
                      

						<div class="form-group">
							<div class="col-md-6 col-md-offset-2">
								<button type="submit" class="btn btn-primary">
									Simpan
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	</div>
@endsection

@stop