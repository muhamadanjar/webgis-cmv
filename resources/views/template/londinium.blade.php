<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
<title>WebGIS - CMV</title>

@include('template.londinium-css')

@include('template.londinium-script')
<script type="text/javascript" src="{{ asset('js/application.js')}}"></script>

</head>

<body class="navbar-fixed">

	<!-- Navbar -->

	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="navbar-header">
			<a class="navbar-brand" href="#"><img src="{{ asset('images/logo.png')}}" alt="Administrator"></a>
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
						<a href="#" class="pull-left"><i class="icon-spinner7"></i></a>
						<span>Messages</span>
						<a href="#" class="pull-right"><i class="icon-new-tab"></i></a>
					</div>
					<ul class="popup-messages">
						<li class="unread">
							<a href="#">
								<img src="http://placehold.it/300" alt="" class="user-face">
								<strong>Eugene Kopyov <i class="icon-attachment2"></i></strong>
								<span>Aliquam interdum convallis massa...</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="http://placehold.it/300" alt="" class="user-face">
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
					<img src="http://placehold.it/300" alt="">
					<span>{{ \Auth::user()->name }}</span>
					<i class="caret"></i>
				</a>
				<ul class="dropdown-menu dropdown-menu-right icons-right">
					<li><a href="#"><i class="icon-user"></i> Profile</a></li>
					<li><a href="#"><i class="icon-bubble4"></i> Messages</a></li>
					<li><a href="#"><i class="icon-cog"></i> Settings</a></li>
					<li><a href="#"><i class="icon-exit"></i> Logout</a></li>
				</ul>
			</li>
		</ul>
		@endif
	</div>
	<!-- /navbar -->


	<!-- Page container -->
 	<div class="page-container">


		<!-- Sidebar -->
		@include('template.londinium-sidebar')
		<!-- /sidebar -->


		<!-- Page content -->
	 	<div class="page-content">


			<!-- Page header -->
			
			@yield('page-header')
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			
			@yield('breadcrumb')
			<!-- /breadcrumbs line -->


			<!-- Callout -->
			
			@yield('callout')
            <!-- /callout -->

           	@yield('content')

	        <!-- Modal options -->
            <div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i> Modals</h6></div>
                <div class="panel-body">
	                <div class="row">
	                    <div class="col-md-6">
	                        <ul class="nav nav-list">
	                            <li class="nav-header">Advanced usage</li>
	                            <li><a data-toggle="modal" role="button" href="#default_modal">Default Dialog</a></li>
	                            <li><a data-toggle="modal" role="button" href="#iconified_modal">Iconified modal</a></li>
	                            <li><a data-toggle="modal" role="button" href="#form_modal">Modal with form</a></li>
	                            <li><a data-toggle="modal" role="button" href="#table_modal">Modal with table</a></li>
	                            <li><a data-toggle="modal" role="button" href="icons.html" data-target="#remote_modal">Loading remote path</a></li>
	                            <li><a data-toggle="modal" role="button" href="#tabs_modal">Modal with tabs</a></li>
	                            <li><a data-toggle="modal" role="button" href="#editor_modal">WYSIWYG editor inside modal</a></li>
	                            <li><a data-toggle="modal" role="button" href="#large_modal">Large modal</a></li>
	                            <li><a data-toggle="modal" role="button" href="#small_modal">Small modal</a></li>
                            </ul>                       
	                    </div>
	                
	                    <div class="col-md-6">
	                        <span class="subtitle"><i class="icon-droplet"></i> Default dialog style</span>
	                        <div class="well">

								<div class="modal modal-demo">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title">Modal title</h4>
											</div>

											<div class="modal-body with-padding">
												<p>One fine body&hellip;</p>
											</div>

											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<button type="button" class="btn btn-primary">Save changes</button>
											</div>
										</div>
									</div>
								</div>

	                        </div>
	                    </div>
	                </div>
                </div>
            </div>
            <!-- /modal options -->


            <!-- Default modal -->
			<div id="default_modal" class="modal fade" tabindex="-1" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Modal title</h4>
						</div>

						<div class="modal-body with-padding">
							<h5 class="text-error">Text in a modal</h5>
							<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>

							<h5 class="text-error">Tooltips in a modal</h5>
							<p><a href="#" class="tip" title="" data-original-title="Tooltip">This link</a> and <a href="#" class="tip" title="" data-original-title="Tooltip">that link</a> should have tooltips on hover.</p>

							<hr>

							<h5 class="text-error">Overflowing text to show optional scrollbar</h5>
							<p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
							<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
							<p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Save changes</button>
						</div>
					</div>
				</div>
			</div>
			<!-- /default modal -->


            <!-- Iconified modal -->
			<div id="iconified_modal" class="modal fade" tabindex="-1" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><i class="icon-accessibility"></i> Modal with icons</h4>
						</div>

						<div class="modal-body with-padding">
							<div class="alert alert-danger block-inner">
				                <i class="icon-cogs"></i> Alert inside modal sample
				                <button type="button" class="close" data-dismiss="alert">×</button>
				            </div>

							<h5><i class="icon-text-height"></i> Sample heading with icon</h5>
							<p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>

							<hr>

							<p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
						</div>

						<div class="modal-footer">
							<button class="btn btn-warning" data-dismiss="modal"><i class="icon-cancel-circle"></i> Close</button>
							<button class="btn btn-primary"><i class="icon-checkmark-circle"></i> Save</button>
						</div>
					</div>
				</div>
			</div>
			<!-- /iconified modal -->


            <!-- Form modal -->
			<div id="form_modal" class="modal fade" tabindex="-1" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><i class="icon-paragraph-justify2"></i> Modal with form</h4>
						</div>

						<!-- Form inside modal -->
						<form action="#" role="form">

							<div class="modal-body with-padding">
								<div class="block-inner text-danger">
									<h6 class="heading-hr">Step 1: Your shipping information <small class="display-block">Please enter your shipping info</small></h6>
								</div>

	                            <div class="form-group">
	                                <label>Country:</label>
                                    <select data-placeholder="Choose a Country..." class="select-full" tabindex="2">
                                        <option value=""></option> 
                                        <option value="Cambodia">Cambodia</option> 
                                        <option value="Cameroon">Cameroon</option> 
                                        <option value="Canada">Canada</option> 
                                        <option value="Cape Verde">Cape Verde</option> 
                                    </select>
	                            </div>

								<div class="form-group">
									<div class="row">
									<div class="col-sm-6">
										<label>First name</label>
										<input type="text" placeholder="Eugene" class="form-control">
									</div>

									<div class="col-sm-6">
										<label class="control-label">Last name</label>
										<input type="text" placeholder="Kopyov" class="form-control">
									</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-sm-6">
											<label>Address line 1</label>
											<input type="text" placeholder="Ring street 12" class="form-control">
										</div>

										<div class="col-sm-6">
											<label>Address line 2</label>
											<input type="text" placeholder="building D, flat #67" class="form-control">
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-sm-4">
											<label>City</label>
											<input type="text" placeholder="Munich" class="form-control">
										</div>

										<div class="col-sm-4">
											<label>State/Province</label>
											<input type="text" placeholder="Bayern" class="form-control">
										</div>

										<div class="col-sm-4">
											<label>ZIP code</label>
											<input type="text" placeholder="1031" class="form-control">
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-sm-6">
											<label>Email</label>
											<input type="text" placeholder="eugene@kopyov.com" class="form-control">
											<span class="help-block">name@domain.com</span>
										</div>

										<div class="col-sm-6">
											<label>Phone #</label>
											<input type="text" placeholder="+99-99-9999-9999" data-mask="+99-99-9999-9999" class="form-control">
											<span class="help-block">+99-99-9999-9999</span>
										</div>
									</div>
								</div>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Submit form</button>
							</div>

						</form>
					</div>
				</div>
			</div>
			<!-- /form modal -->


            <!-- Modal with table -->
			<div id="table_modal" class="modal fade" tabindex="-1" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><i class="icon-accessibility"></i> Modal with table</h4>
						</div>

						<div class="modal-body with-padding">
							<div class="panel panel-default">
				                <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> Table inside modal</h6></div>
				                <table class="table table-bordered table-striped datatable-selectable">
				                    <thead>
				                        <tr>
				                            <th>#</th>
				                            <th>First Name</th>
				                            <th>Last Name</th>
				                            <th>Username</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                        <tr>
				                            <td>1</td>
				                            <td>Mark</td>
				                            <td>Otto</td>
				                            <td>@mdo</td>
				                        </tr>
				                        <tr>
				                            <td>2</td>
				                            <td>Jacob</td>
				                            <td>Thornton</td>
				                            <td>@fat</td>
				                        </tr>
				                        <tr>
				                            <td>3</td>
				                            <td>Larry</td>
				                            <td>the Bird</td>
				                            <td>@twitter</td>
				                        </tr>
				                        <tr>
				                            <td>1</td>
				                            <td>Mark</td>
				                            <td>Otto</td>
				                            <td>@mdo</td>
				                        </tr>
				                        <tr>
				                            <td>2</td>
				                            <td>Jacob</td>
				                            <td>Thornton</td>
				                            <td>@fat</td>
				                        </tr>
				                        <tr>
				                            <td>3</td>
				                            <td>Larry</td>
				                            <td>the Bird</td>
				                            <td>@twitter</td>
				                        </tr>
				                        <tr>
				                            <td>1</td>
				                            <td>Mark</td>
				                            <td>Otto</td>
				                            <td>@mdo</td>
				                        </tr>
				                        <tr>
				                            <td>2</td>
				                            <td>Jacob</td>
				                            <td>Thornton</td>
				                            <td>@fat</td>
				                        </tr>
				                        <tr>
				                            <td>3</td>
				                            <td>Larry</td>
				                            <td>the Bird</td>
				                            <td>@twitter</td>
				                        </tr>
				                        <tr>
				                            <td>1</td>
				                            <td>Mark</td>
				                            <td>Otto</td>
				                            <td>@mdo</td>
				                        </tr>
				                        <tr>
				                            <td>2</td>
				                            <td>Jacob</td>
				                            <td>Thornton</td>
				                            <td>@fat</td>
				                        </tr>
				                        <tr>
				                            <td>3</td>
				                            <td>Larry</td>
				                            <td>the Bird</td>
				                            <td>@twitter</td>
				                        </tr>
				                    </tbody>
				                </table>
			                </div>
						</div>

						<div class="modal-footer">
							<button class="btn btn-warning" data-dismiss="modal"><i class="icon-cancel-circle"></i> Close</button>
							<button class="btn btn-primary"><i class="icon-checkmark-circle"></i> Save</button>
						</div>
					</div>
				</div>
			</div>
			<!-- /modal with table -->


            <!-- Modal with remote path -->
			<div id="remote_modal" class="modal fade" tabindex="-1" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><i class="icon-accessibility"></i> Loading remote path</h4>
						</div>

						<div class="modal-body with-padding">
							<p>One fine body&hellip;</p>
						</div>

						<div class="modal-footer">
							<button class="btn btn-warning" data-dismiss="modal">Close</button>
							<button class="btn btn-primary">Save</button>
						</div>
					</div>
				</div>
			</div>
			<!-- /modal with remote path -->


            <!-- Modal with tabs -->
			<div id="tabs_modal" class="modal fade" tabindex="-1" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><i class="icon-accessibility"></i> Modal with tabs</h4>
						</div>

						<div class="modal-body with-padding">
			                <div class="tabbable">
			                    <ul class="nav nav-tabs">
			                        <li class="active"><a href="#tab1" data-toggle="tab"><i class="icon-download"></i> Section 1</a></li>
			                        <li><a href="#tab2" data-toggle="tab"><i class="icon-windows8"></i> Section 2</a></li>
			                    </ul>
			                    <div class="tab-content">
			                        <div class="tab-pane fade in active" id="tab1">
						                <table class="table table-bordered table-striped datatable">
						                    <thead>
						                        <tr>
						                            <th>#</th>
						                            <th>First Name</th>
						                            <th>Last Name</th>
						                            <th>Username</th>
						                        </tr>
						                    </thead>
						                    <tbody>
						                        <tr>
						                            <td>1</td>
						                            <td>Mark</td>
						                            <td>Otto</td>
						                            <td>@mdo</td>
						                        </tr>
						                        <tr>
						                            <td>2</td>
						                            <td>Jacob</td>
						                            <td>Thornton</td>
						                            <td>@fat</td>
						                        </tr>
						                        <tr>
						                            <td>3</td>
						                            <td>Larry</td>
						                            <td>the Bird</td>
						                            <td>@twitter</td>
						                        </tr>
						                        <tr>
						                            <td>1</td>
						                            <td>Mark</td>
						                            <td>Otto</td>
						                            <td>@mdo</td>
						                        </tr>
						                        <tr>
						                            <td>2</td>
						                            <td>Jacob</td>
						                            <td>Thornton</td>
						                            <td>@fat</td>
						                        </tr>
						                        <tr>
						                            <td>3</td>
						                            <td>Larry</td>
						                            <td>the Bird</td>
						                            <td>@twitter</td>
						                        </tr>
						                        <tr>
						                            <td>1</td>
						                            <td>Mark</td>
						                            <td>Otto</td>
						                            <td>@mdo</td>
						                        </tr>
						                        <tr>
						                            <td>2</td>
						                            <td>Jacob</td>
						                            <td>Thornton</td>
						                            <td>@fat</td>
						                        </tr>
						                        <tr>
						                            <td>3</td>
						                            <td>Larry</td>
						                            <td>the Bird</td>
						                            <td>@twitter</td>
						                        </tr>
						                        <tr>
						                            <td>1</td>
						                            <td>Mark</td>
						                            <td>Otto</td>
						                            <td>@mdo</td>
						                        </tr>
						                        <tr>
						                            <td>2</td>
						                            <td>Jacob</td>
						                            <td>Thornton</td>
						                            <td>@fat</td>
						                        </tr>
						                        <tr>
						                            <td>3</td>
						                            <td>Larry</td>
						                            <td>the Bird</td>
						                            <td>@twitter</td>
						                        </tr>
						                    </tbody>
						                </table>
			                        </div>
			                        <div class="tab-pane body fade" id="tab2">
										<form>
											<textarea class="editor form-control" placeholder="Enter text ..."></textarea>
										</form>
			                        </div>
			                    </div>
			                </div>
						</div>

						<div class="modal-footer">
							<button class="btn btn-warning" data-dismiss="modal">Close</button>
							<button class="btn btn-primary">Save</button>
						</div>
					</div>
				</div>
			</div>
			<!-- /modal with tabs -->


            <!-- Modal with WYSIWYG editor -->
			<div id="editor_modal" class="modal fade" tabindex="-1" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><i class="icon-accessibility"></i> WYSIWYG editor inside modal</h4>
						</div>

						<div class="modal-body with-padding">
							<textarea class="editor form-control" placeholder="Enter text ..."></textarea>
						</div>

						<div class="modal-footer">
							<button class="btn btn-warning" data-dismiss="modal">Close</button>
							<button class="btn btn-primary">Save</button>
						</div>
					</div>
				</div>
			</div>
			<!-- /modal with WYSIWYG editor -->


            <!-- Large modal -->
			<div id="large_modal" class="modal fade" tabindex="-1" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><i class="icon-accessibility"></i> Large modal</h4>
						</div>

						<div class="modal-body with-padding">
							<textarea class="editor form-control" placeholder="Enter text ..."></textarea>
						</div>

						<div class="modal-footer">
							<button class="btn btn-warning" data-dismiss="modal">Close</button>
							<button class="btn btn-primary">Save</button>
						</div>
					</div>
				</div>
			</div>
			<!-- /large modal -->


            <!-- Small modal -->
			<div id="small_modal" class="modal fade" tabindex="-1" role="dialog">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><i class="icon-accessibility"></i> Small modal</h4>
						</div>

						<div class="modal-body with-padding">
							<p>One fine body&hellip;</p>
						</div>

						<div class="modal-footer">
							<button class="btn btn-warning" data-dismiss="modal">Close</button>
							<button class="btn btn-primary">Save</button>
						</div>
					</div>
				</div>
			</div>
			<!-- /small modal -->


            <!-- jGrowl notifications -->
            <div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble-check"></i> Growl notifications</h6></div>
                <div class="panel-body">
	                <div class="row">
	                    <div class="col-md-6">
	                        <ul class="nav nav-list">
	                            <li class="nav-header">jGrowl advanced usage</li>
	                            <li><a onclick="$.jGrowl('Hello world!');">Default notification</a></li>
	                            <li><a onclick="$.jGrowl('Stick this!', { sticky: true });">Sticky notification</a></li>
	                            <li><a onclick="$.jGrowl('A message with a header', { header: 'Important' });">Notification with header</a></li>
	                            <li><a onclick="$.jGrowl('A message that will live a little longer.', { life: 10000 });">Long live notification</a></li>
	                            <li><a onclick="$.jGrowl('Something went wrong here', { sticky: true, theme: 'growl-error', header: 'Error!' });">Error notification</a></li>
	                            <li><a onclick="$.jGrowl('Everything is fine here', { sticky: true, theme: 'growl-success', header: 'Success!' });">Success notification</a></li>
	                            <li><a onclick="$.jGrowl('Be sure you want to do it!', { sticky: true, theme: 'growl-warning', header: 'Attention all units!' });">Warning notification</a></li>
                            </ul>                       
	                    </div>
	                
	                    <div class="col-md-6">
	                        <span class="subtitle"><i class="icon-droplet"></i> Default Growl styling</span>
			            	<div class="well jgrowl-showcase">
			            		<div class="row">
				            		<div class="col-md-6">
							            <div class="jGrowl">
								            <div class="jGrowl-notification">
									            <div class="jGrowl-close">×</div>
									            <div class="jGrowl-header">Some info!</div>
									            <div class="jGrowl-message">Info message text sample</div>
								            </div>
							            </div>

							            <div class="jGrowl">
								            <div class="jGrowl-notification growl-error">
									            <div class="jGrowl-close">×</div>
									            <div class="jGrowl-header">Error!</div>
									            <div class="jGrowl-message">Something went wrong here</div>
								            </div>
							            </div>
				            		</div>

				            		<div class="col-md-6">
							            <div class="jGrowl">
								            <div class="jGrowl-notification growl-warning">
									            <div class="jGrowl-close">×</div>
									            <div class="jGrowl-header">Warning!</div>
									            <div class="jGrowl-message">Be sure you want to do it!</div>
								            </div>
							            </div>

							            <div class="jGrowl">
								            <div class="jGrowl-notification growl-success">
									            <div class="jGrowl-close">×</div>
									            <div class="jGrowl-header">Success!</div>
									            <div class="jGrowl-message">Everything is fine here</div>
								            </div>
							            </div>
				            		</div>
			            		</div>
			            	</div>
	                    </div>
	                </div>
                </div>
            </div>
			<!-- /jGrowl notifications -->


            <hr>




        	<!-- Labels and badges -->
            <div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title"><i class="icon-new"></i> Labels</h6></div>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Labels</th>
                        <th>Markup</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><span class="label label-default">Default</span></td>
                        <td><code>&lt;span class="label label-default"&gt;Default&lt;/span&gt;</code></td>
                    </tr>
                    <tr>
                        <td><span class="label label-primary">Primary</span></td>
                        <td><code>&lt;span class="label label-primary"&gt;Primary&lt;/span&gt;</code></td>
                    </tr>
                    <tr>
                        <td><span class="label label-success">Success</span></td>
                        <td><code>&lt;span class="label label-success"&gt;Success&lt;/span&gt;</code></td>
                    </tr>
                    <tr>
                        <td><span class="label label-warning">Warning</span></td>
                        <td><code>&lt;span class="label label-warning"&gt;Warning&lt;/span&gt;</code></td>
                    </tr>
                    <tr>
                        <td><span class="label label-danger">Danger</span></td>
                        <td><code>&lt;span class="label label-danger"&gt;Danger&lt;/span&gt;</code></td>
                    </tr>
                    <tr>
                        <td><span class="label label-info">Info</span></td>
                        <td><code>&lt;span class="label label-info"&gt;Info&lt;/span&gt;</code></td>
                    </tr>
                    <tr>
                        <td><span class="badge">142</span></td>
                        <td><code>&lt;span class="badge"&gt;Badge&lt;/span&gt;</code></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        	<!-- /label and badges -->


	        <!-- Footer -->
	        
	        @yield('footer')
	        <!-- /footer -->


		</div>
		<!-- /page content -->

	</div>
	<!-- /content -->

</body>
</html>