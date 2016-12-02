@extends('template.londinium')
@section('content')            
            <form class="form-horizontal form-bordered" action="{{ url('admin/mail/mail') }}" method="post" role="form">
	            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="panel panel-default">
	                <div class="panel-heading"><h6 class="panel-title"><i class="icon-mail2"></i> Kirim Pesan</h6></div>
	                <div class="panel-body">
                        <div class="form-group">
				            <label class="col-sm-2 control-label">Kirim Ke:</label>
				            <div class="col-sm-10">
				            	<input type="text" class="form-control" name="mailto">
				            </div>
				        </div>

				        <div class="form-group">
				            <label class="col-sm-2 control-label">Hal:</label>
				            <div class="col-sm-10">
				            	<input type="text" class="form-control" name="subject">
				            </div>
				        </div>
	
				        <div class="form-group">
				            <label class="col-sm-2 control-label">Textarea:</label>
				            <div class="col-sm-10">
				            	<textarea rows="5" cols="5" class="form-control" name="body"></textarea>
				            </div>
				        </div>

                        <div class="form-actions text-right">
                        	<input type="submit" value="Kirim" class="btn btn-primary">
                        </div>

				    </div>
				</div>
			</form>
@endsection
@stop