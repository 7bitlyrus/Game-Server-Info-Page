<?php
/*
Minecraft (Pre Beta 1.7) Module

Server Array Format:
Array("mcpre17", "<name>", "<ip>", <port>)
*/

require_once("PHP-Minecraft-Query/src/MinecraftPing.php");
require_once("PHP-Minecraft-Query/src/MinecraftPingException.php");
use xPaw\MinecraftPing;
use xPaw\MinecraftPingException;

$Query = new MinecraftPing( $server[2], $server[3], $behavior["timeout"]);
$info = $Query->QueryOldPre17();

$players_r = Array(Array("(and {$info["Players"]} more players)", "-"));

array_push($servers_r, Array($server[1], "?v=nomethod&n={$server[2]}:{$server[3]}", $info["Players"], $info["MaxPlayers"], $info["HostName"], $players_r));

$Query->Close();