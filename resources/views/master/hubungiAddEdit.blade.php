@extends('template.londinium')
@section('content')   
	<form class="form-horizontal" action="#" role="form">
	    <div class="panel panel-default">
	        <div class="panel-heading"><h6 class="panel-title"><i class="icon-paragraph-justify2"></i> Static control</h6></div>
	        <div class="panel-body">
				<div class="form-group">
				    <label class="col-sm-2 control-label">Nama:</label>
				    <div class="col-sm-10">
				        <input type="text" name="name" class="form-control">
				    </div>
				</div>
				        
				<div class="form-group">
				    <label class="col-sm-2 control-label">Email:</label>
				    <div class="col-sm-10">
				        <input type="text" name="email" class="form-control">
				    </div>
				</div>
				        
				<div class="form-group">
				    <label class="col-sm-2 control-label">Subyek:</label>
				    <div class="col-sm-10">
				        <input type="text" name="subjek" class="form-control">
				    </div>
				</div>
				        
				<div class="form-group">
				    <label class="col-sm-2 control-label">Pesan:</label>
				    <div class="col-sm-10">
				        <textarea rows="5" cols="5" name="pesan" class="form-control" placeholder="Tulis Pesan"></textarea>
				    </div>
				</div>

                <div class="form-actions text-right">
                    <input type="submit" value="Submit form" class="btn btn-primary">
                </div>

			</div>
		</div>
	</form>
@endsection

@stop