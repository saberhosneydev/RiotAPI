<?php

namespace SHD;

class Config
{
    public static $SERVER_NAME = "";
    const summonerAPI = "/lol/summoner/v4/summoners/by-name/";
    const matchListAPI = "/lol/match/v4/matchlists/by-account/";
    const matchAPI = "/lol/match/v4/matches/";
    const API_KEY = "RGAPI-e922ecc2-84e4-4058-8958-a6c5e3eb854a";
    const SERVERS = [
    "BR1" => "br1.api.riotgames.com",
    "EUN1"=> "eun1.api.riotgames.com",
    "EUW1" => "euw1.api.riotgames.com",
    "JP1" => "jp1.api.riotgames.com",
    "KR" => "kr.api.riotgames.com",
    "LA1" => "la1.api.riotgames.com",
    "LA2" => "la2.api.riotgames.com",
    "NA1" => "na1.api.riotgames.com",
    "OC1" => "oc1.api.riotgames.com",
    "TR1" => "tr1.api.riotgames.com",
    "RU" => "ru.api.riotgames.com"
    ];
    public function setServer($serverName)
    {
        $serverName = \strtoupper($serverName);
        self::$SERVER_NAME = $serverName;
    }
}
