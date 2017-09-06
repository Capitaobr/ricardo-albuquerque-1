<?php


$mongo = new Mongo('mongodb://uniceub:123456@localhost:27017');
$db = $mongo->userdb;
$col = $db->user;
$total = $col->count(true);
echo ($total) ." registros encontrados.<p>";
$mongo->close();