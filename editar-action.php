<?php

include 'config.php';
$id= filter_input(INPUT_POST, 'id');
$nome= filter_input(INPUT_POST, 'nome');
$email= filter_input(INPUT_POST, 'email');

$tel= filter_input(INPUT_POST, 'tel');
$idade= filter_input(INPUT_POST, 'idade');


    if($id && $nome && $email){
    
        $sql= $pdo->prepare("UPDATE users SET nome=:nome, email=:email, tel=:tel, idade=:idade WHERE id= :id");
        $sql->bindValue(':id', $id );
        $sql->bindValue(':nome', $nome );
        $sql->bindValue(':email', $email );
        $sql->bindValue(':tel', $tel );
        $sql->bindValue(':idade', $idade);
        $sql->execute();
    
     header("location: index.php");
     exit;
    
    }else{
        header("location: editar.php");
        exit;
    }


?>