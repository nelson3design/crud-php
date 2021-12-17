<?php

include 'config.php';

$nome= filter_input(INPUT_POST, 'nome');
$email= filter_input(INPUT_POST, 'email');
$tel= filter_input(INPUT_POST, 'tel');
$idade= filter_input(INPUT_POST, 'idade');

$sql= $pdo->prepare("SELECT * FROM users WHERE email=:email");
$sql->bindValue(':email', $email );
$sql->execute();
if($sql->rowCount() ===0){

    if($nome && $email&& $tel && $idade){
    
        $sql= $pdo->prepare("INSERT INTO users (nome, email, tel, idade) VALUES (:nome, :email, :tel, :idade)");
        $sql->bindValue(':nome', $nome );
        $sql->bindValue(':email', $email );
        $sql->bindValue(':tel', $tel );
        $sql->bindValue(':idade', $idade );
        $sql->execute();
    
     header("location: index.php");
     exit;
    
    }else{
        header("location: adicionar.php");
        exit;
    }
}else{
    header("location: adicionar.php");
    exit;
}


?>