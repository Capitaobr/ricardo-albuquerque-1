<?php

//echo "estou aqui!";

phpinfo();
require_once ("treater/requestTreater.php");

echo (new RequestTreater())->start();
