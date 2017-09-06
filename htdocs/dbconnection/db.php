<?php

$mongo = new Mongo( 'mongodb://uniceub:123456@localhost:27017' );
$mongo->selectDB( 'userdb' )->selectCollection( 'users' )->insert( array( 'nome' => utf8_decode($node->user->name) , 'user' => $node->text ) );
