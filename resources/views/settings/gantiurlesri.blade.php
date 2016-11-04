@extends('template.londinium')
@section('page-header')
	<div class="page-header">
		<div class="page-title">
			<h3>Ganti URL <small>Mengganti URL Web Map Service </small></h3>
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
@section('content')
<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-file"></i> Ubah URL</h6></div>
    <div class="panel-body">             
        <div class="row">
            <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-dismissible alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            Semua data harus diisi.
                        </div>
                    @else
                        
                    @endif
                    
                    <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="search" class="col-md-2 control-label-reverse">Cari URL</label>
                            <div class="col-md-8">
                                <input type="text" name="search" class="form-control" placeholder="Cari Server host" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="replace" class="col-md-2 control-label-reverse">Ganti URL</label>
                            <div class="col-md-8">
                                <input type="text" name="replace" class="form-control" placeholder="Ganti Server host">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-11 col-md-offset-1">
                                <a href="#" class="btn btn-default">Reset</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    
                    </form>
            </div>
        </div>
    </div>
</div>
@stop