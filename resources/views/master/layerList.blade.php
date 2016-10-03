@extends('app')
@section('content')
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
			 	<h6 class="panel-title"><i class="icon-file"></i> Post</h6>
			</div>
			<a href="{{ action('LayerCtrl@getTambah') }}"><button class="btn btn-primary" type="button">Tambah</button></a>
			    <div class="datatable_">
				    <table class="table table-striped table-bordered">
				        <thead>
				            <tr>
				                <th>Nama Layer</th>
				                <th>Url</th>
				                <th>Layer</th>
				                <th>#</th>
				            </tr>
				        </thead>
				        <tbody>

				            @foreach($layer as $key => $p)
				            	<?php $disabled = ($p->jsonfield != null) ? '' : 'disabled' ;  ?>											
								<tr>
				                    <td>{{ $p->layername }}</td>
				                    <td>{{ $p->layerurl }}</td>
				                    <td>{{ $p->layer }}</td>
				                    <td>
				                        <div class="btn-group">
					                        <button data-toggle="dropdown" class="btn btn-icon btn-success dropdown-toggle" type="button"><i class="icon-cog4 caret"></i></button>
													<ul class="dropdown-menu icons-right dropdown-menu-right">
														<li><a href="{{ url('admin/layer/ubah', array($p->id_layer)) }}"><i class="icon-quill2"></i> Ubah</a></li>

														<li data-form="#frmDelete-{{ $p->id_layer }}" data-title="Delete Layer" data-message="Are you sure you want to hapus layer ?">
															<a class = "formConfirm" href="#"><i class="icon-delete"></i> Hapus</a>
														</li>
														<form method="get" 
														action="{{ url('admin/layer/hapus/'.$p->id_layer) }}"
														style="display:none" 
														id="frmDelete-{{$p->id_layer}}">
															
														</form>

														<li class="divider"></li>
					                                    <li>
					                                    	<a href="{{ url('admin/layer/layerinfo',array($p->id_layer)) }}">
					                                    	<i class="fa fa-bars"></i> Setting PopUp</a>
					                                    </li>
					                                    
					                                    <li class="{{$disabled}}" 
					                                        data-form="#frmCEsri-{{ $p->id_layer }}" 
					                                        data-title="Hapus data esri {{ $p->layername }}" 
					                                        data-message="apa anda yakin menghapus data esri {{ $p->layername }} ?">
					                                        <a class= "formConfirm" href="#"><i class="fa fa-bell" disabled></i> Hapus data Esri</a>
					                                    </li>
					                                    <form 
					                                    action="{{ url('admin/layer/layeresrihapus', array($p->id_layer)) }}" 
					                                    method="get" 
					                                    style="display:none" 
					                                    id="frmCEsri-{{ $p->id_layer}}"></form>
				                        </div>
				                    </td>
				                </tr>
							@endforeach

				        </tbody>
				    </table>           
			    </div>
		</div>	
	</div>					
	


@stop