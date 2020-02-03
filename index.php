<?php

require 'vendor/autoload.php';

use SHD\LeagueAPI as League;
use SHD\Config as Config;
use SHD\DDragonAPI as DDragonAPI;

$ddragon = new DDragonAPI;
$league = new League;
$config = new Config;

$config->setServer("euw1");

$summoner = $league->getSummonerInfo("CràpBag");

?>
<!doctype html>
<html>
  <head>
    <title>Hello, world!</title>
    <link rel="stylesheet" href="./css/bulma.min.css">
  </head>
  <body>
    <h1 class="is-inline title">Hello, <?php echo $summoner->name. " Lvl : ". $summoner->summonerLevel ."Account ID : ".$summoner->accountId;?></h1>
    <img class="is-inline" src="<?php echo $ddragon->profileIcon($summoner->profileIconId) ?>" height="64" width="64"> 
  </body>
</html>