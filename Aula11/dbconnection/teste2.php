<?php

// conectando ao banco mongo
$m = new MongoClient("mongodb://uniceub:123456@localhost:27017");
$db= $m->users; // seleciona o banco de dados "foo"


// busca sua coleção de dados "foo", que podemos traduzir como "tabela" num banco relacional
$m = $db->selectCollection("users");

// agora a $m é uma instancia da classe MongoCollection e com essa instancia vc poderá
// usar os metodos insert, save e etc.
$m->insert(array('x' => 1)); // salva o array na collection usuário