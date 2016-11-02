@extends('template.londinium')

@section('content')

<?php

	$id = $users->id;
	$username = $users->username;
	$name = $users->name;
	$email = $users->email;
	$password = $users->password;
	$oldpassword = $users->password;
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><h6 class="panel-title"><i class="icon-file"></i> Ganti Kata Kunci User</h6></div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
						<div class="form-group">
							<label class="col-md-2 control-label">Username</label>
							<div class="col-md-6">
								<input type="text" class="form-control" readonly name="username" value="{{ $username }}" readonly>
							</div>
						</div>
						

						<div class="form-group">
							<label class="col-md-2 control-label">Kata Kunci</label>
							<div class="col-md-6">
								<input type="hidden" class="form-control" name="oldpassword" value="{{ $password }}">
								<input type="password" class="form-control" name="password" value="{{ $password }}">
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