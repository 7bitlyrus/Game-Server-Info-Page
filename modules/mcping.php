<?php
/*
Minecraft (Ping) Module

Server Array Format:
Array("mcping", "<name>", "<ip>", <port>)
*/

require_once("PHP-Minecraft-Query/src/MinecraftPing.php");
require_once("PHP-Minecraft-Query/src/MinecraftPingException.php");
use xPaw\MinecraftPing;
use xPaw\MinecraftPingException;

$Query = new MinecraftPing( $server[2], $server[3], $behavior["timeout"]);
$info = $Query->Query();

$players_r = Array();
if(isset($info["players"]["sample"])) {
	foreach ($info["players"]["sample"] as $player) {
		array_push($players_r, Array($player["name"], "-"));
	}
}
if(count($players_r) < $info["players"]["online"]) {
	$unlisted = $info["players"]["online"] - count($players_r);
	array_push($players_r, Array("(and {$unlisted} more players)", "-"));
}

array_push($servers_r, Array($server[1], "?v=nomethod&n={$server[2]}:{$server[3]}", $info["players"]["online"], $info["players"]["max"], $info["description"]["text"], $players_r));

$Query->Close();