<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<title><?php echo $branding["title"]; ?></title>
		<style>
		body {
			font-size: 14pt;
			color: <?php echo $branding["darkmode"] ? "#FFFFFF" : "#000000"; ?>
		}
		.btn-primary {
			color: <?php echo $branding["darkmode"] ? "#000000" : "#FFFFFF"; ?>
			background-color: <?php echo $branding["accentcolor"]; ?>;
		}
		.btn, .form-control {
			border:0px solid transparent;
			border-radius: 0;
		}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<h1>No connection method known</h1>
					<p>An automatic connection method is not known for this server. This may be because the server is offline, the configured connection info is invaild, or the server does not have a method to automatically connect.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<?php
					if(empty($_GET['n'])) { 
						?>
							<p>Unfortunately, another method was not provided.</p>
							<a type="button" class="btn btn-primary" href="?">Return</a>
						<?php
						} else {
						?>
							<p>You may attempt to connect to it using the following IP:</p>
							<input type="text" class="form-control input-lg" value="<?php echo $_GET['n']; ?>" readonly>
							<a type="button" class="btn btn-primary" href="?">Return</a>
						<?php
						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>