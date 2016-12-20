<html>
	<head>
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 72px;
				margin-bottom: 40px;
			}

			.error-template {padding: 40px 15px;text-align: center;}
			.error-actions {margin-top:15px;margin-bottom:15px;}
			.error-actions .btn { margin-right:10px; }
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="title">Be right back.</div>
				<div class="error-template">
					<div class="error-actions">
						<a href="{{ url('home') }}" class="btn btn-primary btn-lg"><span class="icon-home"></span>
							Take Me Home </a><a href="{{ url('home') }}" class="btn btn-default btn-lg"><span class="icon-contact"></span> Contact Support </a>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
