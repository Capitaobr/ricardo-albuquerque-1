<?php
include_once("dbconnection/db.php");


//echo "estou aqui!";

//echo(phpinfo());
//require_once ("treater/requestTreater.php");

//echo (new RequestTreater())->start();


$mongo = new MongoDB\Driver\Manager( "mongodb://localhost:27017");
$dbs= new db();
//$dbs-> insert(['_id' => new MongoDB\BSON\ObjectID, 'Nome' => 'Ruan', 'CPF' => 12412566], "dbGood.User");
echo($dbs->search("dbGood.User"));
