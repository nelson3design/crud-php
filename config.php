<?php

$dbname='user';

$hostname='localhost';

$password="";

$username='root';

$pdo= new PDO("mysql:dbname=$dbname;host=$hostname", $username, $password);

// $sql=$pdo->query('SELECT * FROM users');

// $dados= $sql->fetchAll( PDO::FETCH_ASSOC);


// echo "<pre>";
// print_r($dados);

?>