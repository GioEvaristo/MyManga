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
    $sql = "INSERT INTO Avaliacao (titulo, descricao, Usuario_id_usuario, Manga_id_manga) VALUES(:titulo, :descricao, :id_usuario, :id_manga)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $stmt->bindParam(':id_manga', $id_manga, PDO::PARAM_INT);
    if($stmt->execute()){
        header('Location: exibirAvaliacao.php');
    }else{
        echo "Erro ao cadastrar";
        print_r($stmt->errorInfo());
    }
?>