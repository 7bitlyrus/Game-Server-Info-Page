<?php
/* Servers Array
Source		"source", "<name>", "<ip>", <port>
TeamSpeak 3	"ts3", "<name>", "<ip>", <port>, <query port>, "<query username>", "<query password>"
*/
$servers = Array(
	Array("source", "Source Server", "192.0.2.1", 27015),
	Array("ts3", "Teamspeak Server", "192.0.2.2", 9987, 10011, "serveradmin", "password")
);

$branding = Array(
	"logo" => "http://placehold.it/400x100?text=Game+Server+Info+Page",
	"url" => "http://example.com",
	"title" => "Game Server Info Page",
	"accentcolor" => "#9E9E9E",
	"bgcolor" => "#ffffff",
	"darkmode" => false
);

$behavior = Array(
	"refreshrate" => 10,
	"timeout" => 1
);
?>
