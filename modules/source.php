<?php
require_once("PHP-Source-Query/SourceQuery/bootstrap.php");
use xPaw\SourceQuery\SourceQuery;

$Query = new SourceQuery( );
$Query->Connect( $server[2], $server[3], $behavior["timeout"], SourceQuery::SOURCE);

$info = $Query->GetInfo( );
$players = $Query->GetPlayers( );
$players_r = Array();

foreach ($players as $player) {
	array_push($players_r, Array($player["Name"], $player["TimeF"]));
}

array_push($servers_r, Array($server[1], "steam://connect/{$server[2]}:{$server[3]}", $info["Players"], $info["MaxPlayers"], $info["Map"], $players_r));

$Query->Disconnect( );