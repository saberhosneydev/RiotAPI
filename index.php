<?php

require 'vendor/autoload.php';

use App\League as endPoint;
$api = new endPoint;
echo $api->typer();