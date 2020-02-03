<?php

namespace SHD;

class DDragonAPI
{
    public $VERSION = "";
    static $baseURL = "http://ddragon.leagueoflegends.com/cdn/";

    function __construct(){
        $this->VERSION = self::currentVersion();
    }
    function currentVersion(){
        $url = "https://ddragon.leagueoflegends.com/api/versions.json";
        $ch = \curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = \curl_exec($ch);
        if($result){
            $result = \json_decode($result, true);
            return $result[0];
        }else {
            return \curl_error($ch);
        }
    }
    public function profileIcon($profileIconId){
        $endPoint = "/img/profileicon/";
        $url = self::$baseURL.$this->VERSION.$endPoint.$profileIconId.".png";
        return $url;
    }
}
