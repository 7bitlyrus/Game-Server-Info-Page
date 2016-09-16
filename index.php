<?php

require("config.php");
if(file_exists("config.debug.php")) {
	include("config.debug.php");
}

$servers_r = Array();

if(!isset($_GET['n'])) { 
	foreach ($servers as $server) {
		try {
			if(file_exists("modules/" . $server[0] . ".php")) {
				include("modules/" . $server[0] . ".php");
				echo("Loaded modules/" . $server[0] . ".php<br>");
			} else {
				throw new Exception("Module not found.", 1);
			}
		} catch (Exception $e) {
			array_push($servers_r, Array($server[1], "?v=nomethod&n=" . $server[2]. ":" . $server[3], 0, 0, "Unable to query server.", Array()));
		}
	}
}

$view = isset($_GET["v"]) ? $_GET["v"] : "default";
if(!file_exists("views/" . $view . ".php")) {
	$view = "default";
}
require("views/" . $view . ".php");


?>