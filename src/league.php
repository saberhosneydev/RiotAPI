<?php

namespace SHD;

class LeagueAPI
{
    public function getSummonerInfo($name)
    {
        // Initialize a CURL session.
        $ch = curl_init();
        $decodedName = \curl_escape($ch, $name);
        //if the name has special character replace it with unicode version
        $url = "https://".Config::SERVERS[Config::$SERVER_NAME].Config::summonerAPI.$decodedName."?api_key=".Config::API_KEY;
        //grab URL and pass it to the variable.
        curl_setopt($ch, CURLOPT_URL, $url);
        // Return Page contents.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        if ($result) {
            $result = \json_decode($result);
            return $result;
        } else {
            return \curl_error($ch);
        }
    }
    public function typer()
    {
        return ;
    }
}
