<?php
date_default_timezone_set("UTC"); 

require("PHP-Source-Query/SourceQuery/bootstrap.php");
use xPaw\SourceQuery\SourceQuery;

require("ts3-php-framework/libraries/TeamSpeak3/TeamSpeak3.php");

require("config.php");
if(file_exists("config.debug.php")) {
	include("config.debug.php");
}

$servers_r = Array();

foreach ($servers as $server) {
	try {
		switch ($server[0]) {
			case 'source':
				$Query = new SourceQuery( );
				$Query->Connect( $server[2], $server[3], $behavior["timeout"], SourceQuery::SOURCE);
				$info = $Query->GetInfo( );
				$players = $Query->GetPlayers( );
				$players_r = Array();
				foreach ($players as $player) {
					array_push($players_r, Array($player["Name"], $player["TimeF"]));
				}
				array_push($servers_r, Array($server[1], "steam://connect/".$server[2].":".$server[3], $info["Players"], $info["MaxPlayers"], $info["Map"], $players_r));
				$Query->Disconnect( );
				break;
			
			case 'ts3':
				$ts3 = TeamSpeak3::factory("serverquery://" . $server[5] . ":" . $server[6] . "@" . $server[2] .":" . $server[4] . "/?server_port=" . $server[3]);
				$clients = Array();
				foreach($ts3->clientList() as $client) {
					if($client["client_type"]) continue;
					$ctime = time() - $client["client_lastconnected"];
					$ctime_r = $ctime > 59*60 + 59 ? floor($ctime/(60*60)).":".str_pad(floor(($ctime%60)/60), 2, 0, STR_PAD_LEFT).":".str_pad($ctime%60, 2, 0, STR_PAD_LEFT) : str_pad(floor($ctime/60), 2, 0, STR_PAD_LEFT).":".str_pad($ctime%60, 2, 0, STR_PAD_LEFT);
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
				array_push($servers_r, Array($server[1], "ts3server://".$server[2]."/?port=".$server[3], $ts3->clientCount(), $maxclients, "TeamSpeak3", $clients_r));
				break;

			default:
				throw new Exception("Invaild type");
				break;
		}
	} catch (Exception $e) {

		array_push($servers_r, Array($server[1], "javascript:prompt('','" . $server[2]. ":" . $server[3] . "')", 0, 0, "Unable to query server.", Array()));
	}
}

$view = isset($_GET["v"]) ? $_GET["v"] : "default";
if(!file_exists("views/" . $view . ".php")) {
	$view = "default";
}
require("views/" . $view . ".php");


?>