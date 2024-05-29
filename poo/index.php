<?php

require_once "vendor/autoload.php";

use Uch\Hotel\Hotel;

$hotel = new Hotel(1, "Hotel 1");

echo $hotel->toJson(); // {"codigo":1,"descripcion":"Hotel 1"}