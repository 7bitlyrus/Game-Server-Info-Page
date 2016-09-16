<?php
/*
Teamspeak 3 Module

Server Array Format:
Array("ts3", "<name>", "<ip>", <port>, <query port>, "<query username>", "<query password>")
*/

require_once("ts3-php-framework/libraries/TeamSpeak3/TeamSpeak3.php");
date_default_timezone_set("UTC"); 

$ts3 = TeamSpeak3::factory("serverquery://{$server[5]}:{$server[6]}@{$server[2]}:{$server[4]}/?server_port={$server[3]}");

$clients = Array();
foreach($ts3->clientList() as $client) {
	if($client["client_type"]) continue;
	$ctime = time() - $client["client_lastconnected"];

	$hours = str_pad(floor($ctime/3600), 2, 0, STR_PAD_LEFT);
	$mins  = str_pad(floor($ctime%60/60), 2, 0, STR_PAD_LEFT);
	$secs  = str_pad($ctime%60, 2, 0, STR_PAD_LEFT);

	$ctime_r = $ctime >= 3600 ? "{$hours}:{$mins}:{$secs}" : "{$mins}:{$secs}";

	array_push($clients, Array((string)$client, $ctime_r, $ctime));
}

usort($clients, function ($a, $b) {
	return ($b[2] < $a[2]) ? -1 : (($b[2] > $a[2]) ? 1 : 0);
});

$clients_r = Array();
foreach($clients as $client) {
	array_push($clients_r, Array($client[0], $client[1]));
}

$maxclients = $ts3->isOffline() ? 0 : $ts3->getProperty("virtualserver_maxclients");

array_push($servers_r, Array($server[1], "ts3server://{$server[2]}/?port={$server[3]}", $ts3->clientCount(), $maxclients, "TeamSpeak3", $clients_r));