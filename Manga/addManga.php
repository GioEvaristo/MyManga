<?php
    require_once '../init.php';
    $editora = $_POST['editora'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];

    $PDO = db_connect();
    $sql = "INSERT INTO Manga(editora, titulo, autor) VALUES(:editora, :titulo, :autor)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':editora', $editora);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':autor', $autor);
    if($stmt->execute()){
        header('Location: exibirManga.php');
    }else{
        echo "Erro ao cadastrar";
        print_r($stmt->errorInfo());
    }
?>