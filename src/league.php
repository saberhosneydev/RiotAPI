<?php

namespace SHD;
use SHD\Exception;
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
        //Perform the request and store the result
        $result = curl_exec($ch);

        try {
            if (!curl_error($ch)) {
                switch ($res_code = curl_getinfo($ch, CURLINFO_HTTP_CODE)) {
                    case 200:
                    $result = json_decode($result);
                    return $result;
                    break;

                    case 404:
                    throw new summonerNameException("404");
                    break;

                    case 429:
                    throw new summonerNameException("429");

                    default:
                        echo "Unexpected error happen";
                    break;
                }
                //End Switch
            }
        } catch (summonerNameException $e) {
            echo $e->showError();
            return false;
        }


    }
    public function typer()
    {
        return ;
    }
}
