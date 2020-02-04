<?php

require 'vendor/autoload.php';

use SHD\LeagueAPI as League;
use SHD\Config as Config;
use SHD\DDragonAPI as DDragonAPI;

$ddragon = new DDragonAPI;
$league = new League;

$league->setServer("euw1");

$summoner = $league->getSummonerInfo("CràpBag");

?>
<!doctype html>
<html>
<head>
	<title>Hello, world!</title>
</head>
<body>
	<?php
	if ($summoner) {
		echo "<h1 class='is-inline title'>Hello, {$summoner->name}, Your Lvl is : $summoner->summonerLevel Account ID : $summoner->accountId</h1>
		<img class='is-inline' src='{$ddragon->profileIcon($summoner->profileIconId)}' height='64' width='64'>";
		echo $league->getLastMatch("CràpBag")->seasonId;
	}
	?>
</body>
</html>