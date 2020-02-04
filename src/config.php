<?php

namespace SHD;
use SHD\Exception;
class Config
{

    const summonerByNameAPI = "/lol/summoner/v4/summoners/by-name/";
    const summonerByAccountIdAPI = "/lol/summoner/v4/summoners/by-account/";
    const matchListAPI = "/lol/match/v4/matchlists/by-account/";
    const matchAPI = "/lol/match/v4/matches/";
    const API_KEY = "RGAPI-909279db-3d2d-43d7-b851-935db9a23f0d";
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

    function __construct() {
        self::checkAPIKEY();
    }
    function checkAPIKEY (){
         // Initialize a CURL session.
        $ch = curl_init();
        // Return Page contents.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //if the name has special character replace it with unicode version
        $url = "https://".self::SERVERS['EUW1'].self::summonerByNameAPI."riot"."?api_key=".self::API_KEY;
        //grab URL and pass it to the variable.
        curl_setopt($ch, CURLOPT_URL, $url);
        //Perform the request and store the result
        $result = curl_exec($ch);
        //check if there's an actual result
        if (!curl_error($ch)) {
            switch ($res_code = curl_getinfo($ch, CURLINFO_HTTP_CODE)) {
                case 404:
                break;

                case 403:
                echo "Invalid API_KEY, KEY update is required to continue.";
                exit();
                default:
                echo "Unexpected error";
                break;
            }
        }
    }
}
