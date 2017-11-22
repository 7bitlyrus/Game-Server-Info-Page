<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<title><?php echo $branding["title"]; ?></title>
		<style>
		body, .modal-content {
			background-color: <?php echo $branding["bgcolor"]; ?>;
		}
		body {
			font-size: 14pt;
		}
		.modal-content {
			font-size: 12pt;
		}
		body, .credits, a {
			color: <?php echo $branding["darkmode"] ? "#FFFFFF" : "#000000"; ?>
		}
		th, .btn-primary {
			color: <?php echo $branding["darkmode"] ? "#000000" : "#FFFFFF"; ?>
		}
		.credits {
			font-size: 8pt;
		}
		.credits a {
			color: <?php echo $branding["accentcolor"]; ?>;
		}
		.row {
			margin-top: 100px
		}
		.img-responsive {
			margin: 0 auto;
		}
		table {
			width: 100%;
		}
		th, .btn-primary {
			background-color: <?php echo $branding["accentcolor"]; ?>;
		}
		th {
			font-size: 16pt;
		}
		td, th {
			text-align: center;
		}
		.btn, .modal-content {
			border:0px solid transparent;
			border-radius: 0;
		}
		.noref {
			color: <?php echo $branding["accentcolor"]; ?>;
			font-size: 8pt;
		}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="center-block">
					<a href="<?php echo $branding["url"]; ?>"><img src="<?php echo $branding["logo"]; ?>" class="img-responsive" alt="logo"></a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-md-offset-0">
					<table class="table">
							<tr>
									<th>Server</th>
									<th>Users</th>
									<th>Details</th>
									<th>&nbsp;</th>
							</tr>
							<?php foreach($servers_r as $server_id => $server): ?>
									<tr>
									<td><?php echo $server[0] ?></td>
									<td><a type="button" data-toggle="modal" data-target="#players<?php echo $server_id; ?>"><?php echo "{$server[2]}/{$server[3]}"; ?> Users</a></td>
									<td><?php echo $server[4] ?></td>
									<td><a type="button" class="btn btn-primary" href="<?php echo $server[1] ?>">Join Server</a></td>
								</tr>
							<?php endforeach ?>
					</table>
				</div>
			</div>
			<?php foreach($servers_r as $server_id => $server): ?>
				<div class="modal fade" tabindex="-1" role="dialog" id="players<?php echo $server_id; ?>">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title"><?php echo $server[0] ?></h4>
								</div>
								<div class="modal-body">
									<table class="table">
										<tr>
											<th>Name</th>
											<th>Time</th>
										</tr>
										<?php foreach($server[5] as $player_id => $player): ?>
										<tr>
											<td><?php echo $player[0] ?></td>
											<td><?php echo $player[1] ?></td>
										</tr>
										<?php endforeach ?>
									</table>
								</div>
								<div class="modal-footer">
									<span class="noref">Auto refresh is disabled when user lists are open.</span>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<a type="button" class="btn btn-primary" href="<?php echo $server[1] ?>">Join Server</a>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
			<?php endforeach ?>
			<div>
				<div class="text-center credits">Powered by <a href="https://github.com/IanMurray/Game-Server-Info-Page">Game Server Info Page</a>. <a href="?v=embed">Embed</a> (<a href="?v=embed&only=0">Single</a>)</div>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script>
		window.setInterval(function(){
			if($('.modal.in').length < 1) {
				location.reload()
			}
		}, <?php echo $behavior["refreshrate"]; ?>000);
		</script>
	</body>
</html>