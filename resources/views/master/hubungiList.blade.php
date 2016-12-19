@extends('template.londinium')

@section('content')
            <!-- Pesan list -->
	        <div class="block">
	        	<h6 class="heading-hr"><i class="icon-stack"></i> Pesan </h6>
		        <div class="datatable-invoices">
			        <table class="table table-striped table-bordered">
			        	<thead>
			        		<tr>
			        			<th class="invoice-number">Invoice #</th>
			        			<th>Description</th>
			        			<th class="invoice-amount">Amount</th>
			        			<th>Status</th>
			        			<th class="invoice-date">Issue date</th>
			        			<th class="invoice-date">Due date</th>
			        			<th class="invoice-expand text-center">View</th>
			        		</tr>
			        	</thead>
			        	<tbody>
			        		
			        		<tr>
			        			<td><a href="invoice.html"><strong>#00112</strong></a></td>
			        			<td>Nam dolor sem, rhoncus non sagittis nec, gravida vel velit. Cras condimentum non justo vitae dapibus</td>
			        			<td><h4>$12.290</h4></td>
			        			<td><span class="label label-info">Pending</span></td>
			        			<td><span class="text-semibold">December 12, 2012</span></td>
			        			<td><span class="text-semibold">January 15, 2013</span></td>
			        			<td class="text-center"><a data-toggle="modal" role="button" href="#default-modal" class="btn btn-default btn-xs btn-icon"><i class="icon-file6"></i></a></td>
			        		</tr>	        		
			        	</tbody>
			        </table>
		        </div>
	        </div>
			<!-- /Pesan list -->
@endsection

@stop