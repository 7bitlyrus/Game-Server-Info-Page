<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="refresh" content="<?php echo $behavior["refreshrate"]; ?>">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<style>
		body, .progress {
			background-color: <?php echo $branding["bgcolor"]; ?>;
		}
		.progress {
			margin: 0;
		}
		.progress span{
			display: block;
			position: absolute;
			width: 100%;
		}
		body, .credits, a {
			color: <?php echo $branding["darkmode"] ? "#FFFFFF" : "#000000"; ?>
		}
		.progress-bar, .progress {
			border:0px solid transparent;
			border-radius: 0;
		}
		th, .btn-primary, .progress-bar {
			background-color: <?php echo $branding["accentcolor"]; ?>;
		}
		</style>
	</head>
	<body>
		<?php
		foreach($servers_r as $server):
			$max = $server[3] == 0 ? 1 : $server[3];
			$precent = $server[2]/$max*100;
			?>
			<div class="progress">
				<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $server[2] ?>" aria-valuemin="<?php echo $server[2] ?>" aria-valuemax="<?php echo $server[3] ?>" style="width: <?php echo $precent; ?>%;">
					<span><a href="?" target="_parent" title="<?php echo $server[0] ?>"><?php echo $server[0] . ": " .  $server[2] . "/" . $server[3]; ?></a></span>
				</div>
			</div>
		<?php endforeach ?>
	</body>
</html>