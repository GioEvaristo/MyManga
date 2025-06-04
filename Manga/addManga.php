<?php
    require_once '../init.php';
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];

    $PDO = db_connect();
    $sql = "INSERT INTO Usuario(nome, email, idade) VALUES(:nome, :email, :idade)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':idade', $idade);
    if($stmt->execute()){
        header('Location: exibirUsuarios.php');
    }else{
        echo "Erro ao cadastrar";
        print_r($stmt->errorInfo());
    }
?>