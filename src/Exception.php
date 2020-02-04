<?php

namespace SHD;
use Exception;
class summonerNameException extends Exception
{
	// Redefine the exception so message isn't optional
	public function __construct($message, $code = 0, Exception $previous = null) {
        // some code

        // make sure everything is assigned properly
		parent::__construct($message, $code, $previous);
	}
	public function showError(){
		$error = "";
		if ($this->message == "404") {
			$error = "Summoner Name not found";
		}elseif ($this->message == "429") {
			$error = "Rate limit reached. Please update the API_KEY";
		}
		return $error;
	}
}

?>