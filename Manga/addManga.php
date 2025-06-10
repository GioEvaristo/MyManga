<?php
    require_once '../init.php';
    $editora = $_POST['editora'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $id_categoria = $_POST['id_categoria'];
    if (!isset($id_categoria) || empty($id_categoria)) {
        echo "Categoria inválida.";
        exit;
    }

    $PDO = db_connect();
    $sql = "INSERT INTO Manga (editora, titulo, autor, Categoria_id_categoria) VALUES(:editora, :titulo, :autor, :id_categoria)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':editora', $editora);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':autor', $autor);
    $stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
    if($stmt->execute()){
        header('Location: exibirManga.php');
    }else{
        echo "Erro ao cadastrar";
        print_r($stmt->errorInfo());
    }
?>