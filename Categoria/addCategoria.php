<?php
    require_once '../init.php';
    $genero = $_POST['genero'];
    $classif_indicativa = $_POST['classif_indicativa'];

    $PDO = db_connect();
    $sql = "INSERT INTO Categoria(genero, classif_indicativa) VALUES(:genero, :classif_indicativa)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':genero', $genero);
    $stmt->bindParam(':classif_indicativa', $classif_indicativa);
    if($stmt->execute()){
        header('Location: exibirCategoria.php');
    }else{
        echo "Erro ao cadastrar";
        print_r($stmt->errorInfo());
    }
?>