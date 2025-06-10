<?php
    require_once '../init.php';
    $editora = $_POST['editora'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $Categoria_id_categoria = $_POST['Categoria_id_categoria'];

    $PDO = db_connect();
    $sql = "INSERT INTO Manga(editora, titulo, autor, Categoria_id_categoria) VALUES(:editora, :titulo, :autor, :Categoria_id_categoria)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':editora', $editora);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':autor', $autor);
    $stmt->bindParam(':Categoria_id_categoria', $Categoria_id_categoria);
    if($stmt->execute()){
        header('Location: exibirManga.php');
    }else{
        echo "Erro ao cadastrar";
        print_r($stmt->errorInfo());
    }
?>