@extends('template.londinium')
@section('page-header')
	<div class="page-header">
		<div class="page-title">
			<h3>Layer <small>Jumlah layer yang ada</small></h3>
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
		<li><a href="#">Home</a></li>
		<li class="active">Hubungi</li>
	</ul>
	<div class="visible-xs breadcrumb-toggle">
		<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
	</div>
</div>
@endsection
@section('content')
            <!-- Pesan list -->
	        <div class="block">
	        	<h6 class="heading-hr"><i class="icon-stack"></i> Pesan </h6>
		        <div class="datatable-invoices">
			        <table class="table table-striped table-bordered">
			        	<thead>
			        		<tr>
			        			<th class="invoice-number">Pesan #</th>
			        			<th>Description</th>
			        			<th class="invoice-amount">Amount</th>
			        			<th>Status</th>
			        			<th class="invoice-date">Issue date</th>
			        			<th class="invoice-date">Due date</th>
			        			<th class="invoice-expand text-center">View</th>
			        		</tr>
			        	</thead>
			        	<tbody>
			        		@foreach($pesan as $key => $v)
			        		<tr>
			        			<td><a href="invoice.html"><strong>#00112</strong></a></td>
			        			<td>Nam dolor sem, rhoncus non sagittis nec, gravida vel velit. Cras condimentum non justo vitae dapibus</td>
			        			<td><h4>$12.290</h4></td>
			        			<td><span class="label label-info">Pending</span></td>
			        			<td><span class="text-semibold">December 12, 2012</span></td>
			        			<td><span class="text-semibold">January 15, 2013</span></td>
			        			<td class="text-center"><a data-toggle="modal" role="button" href="#default-modal" class="btn btn-default btn-xs btn-icon"><i class="icon-file6"></i></a></td>
			        		</tr>
							@endforeach
			        	</tbody>
			        </table>
		        </div>
	        </div>
			<!-- /Pesan list -->
@endsection

@stop