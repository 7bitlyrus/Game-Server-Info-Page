<?php
/*
Minecraft (Query) Module

Server Array Format:
Array("mcquery", "<name>", "<ip>", <port>)
*/

require_once("PHP-Minecraft-Query/src/MinecraftQuery.php");
require_once("PHP-Minecraft-Query/src/MinecraftQueryException.php");
use xPaw\MinecraftQuery;
use xPaw\MinecraftQueryException;

$Query = new MinecraftQuery( );
$Query->Connect( $server[2], $server[3], $behavior["timeout"]);

$info = $Query->GetInfo( );
$players = $Query->GetPlayers( );

$players_r = Array();
foreach ($players as $player) {
	array_push($players_r, Array($player, "-"));
}

array_push($servers_r, Array($server[1], "?v=nomethod&n={$server[2]}:{$server[3]}", $info["Players"], $info["MaxPlayers"], $info["HostName"], $players_r));