<?php
    require_once '../init.php';
    $editora = $_POST['editora'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $genero = $_POST['genero'];

    $PDO = db_connect();
    $sql = "INSERT INTO Manga(editora, titulo, autor, genero) VALUES(:editora, :titulo, :autor, :genero)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':editora', $editora);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':autor', $autor);
    $stmt->bindParam(':genero', $genero);
    if($stmt->execute()){
        header('Location: exibirManga.php');
    }else{
        echo "Erro ao cadastrar";
        print_r($stmt->errorInfo());
    }
?>