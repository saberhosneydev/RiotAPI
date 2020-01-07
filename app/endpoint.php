<?php

namespace App;

class endPoint
{
    public function getSummonerInfo($name)
    {
        // Initialize a CURL session.
        $ch = curl_init();
        $decodedName = \curl_escape($ch, $name);
        //if the name has special character replace it with unicode version
        $url = $this->server.$this->summonerAPI.$decodedName."?api_key=".$this->api_key;
        //grab URL and pass it to the variable.
        curl_setopt($ch, CURLOPT_URL, $url);
        // Return Page contents.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        if ($result) {
            return $result;
        }else {
            return \curl_error($ch);
        }
    }
    public function typer($name)
    {
        return Config::server;
    }
}
