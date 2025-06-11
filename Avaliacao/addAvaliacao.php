<?php
    require_once '../init.php';
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $id_usuario = $_POST['id_usuario'];
    if (!isset($id_usuario) || empty($id_usuario)) {
        echo "Usuário Inválido.";
        exit;
    }
    $id_manga = $_POST['id_manga'];
    if (!isset($id_manga) || empty($id_manga)) {
        echo "Mangá Inválido.";
        exit;
    }

    $PDO = db_connect();
    $sql = "INSERT INTO Avaliacao (titulo, descricao, Usuario_id_usuario, Manga_id_manga) VALUES(:editora, :titulo, :autor, :id_categoria)";
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