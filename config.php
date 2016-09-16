<?php
$servers = Array( /* Refer to the files inside modules/ for more details */
	Array("source", "Source Server", "192.0.2.1", 27015),
	Array("ts3", "Teamspeak Server", "192.0.2.2", 9987, 10011, "serveradmin", "password"),
	Array("mcping", "Minecraft Server (Ping)", "192.0.2.3", 25565),
	Array("mcpre17", "Minecraft Server (Pre Beta 1.7)", "192.0.2.4", 25565),
	Array("mcquery", "Minecraft Server (Query)", "192.0.2.5", 25565)
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
	"refreshrate" => 30,
	"timeout" => 1
);
?>
