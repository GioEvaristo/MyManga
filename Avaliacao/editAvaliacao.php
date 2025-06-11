<?php
require '../init.php';

    $id_avaliacao = isset($_POST['id_avaliacao']) ? (int) $_POST['id_avaliacao'] : null;
    $id_usuario = isset($_POST['id_usuario']) ? (int) $_POST['id_usuario'] : null;
    $titulo_avaliacao = isset($_POST['titulo_avaliacao']) ? $_POST['titulo_avaliacao'] : null;
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
    $id_manga = isset($_POST['id_manga']) ? (int) $_POST['id_manga'] : null;
    $PDO = db_connect();

    if (empty($id_avaliacao) || empty($id_usuario) || empty($titulo_avaliacao) || empty($descricao) || empty($id_manga)) {
        header('Location: exibirAvaliacao.php');
        exit;
    }

    $sql = "UPDATE Avaliacao SET Usuario_id_usuario = :id_usuario, titulo = :titulo_avaliacao, descricao = :descricao, Manga_id_manga = :id_manga WHERE id_avaliacao = :id_avaliacao";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $stmt->bindParam(':titulo_avaliacao', $titulo_avaliacao);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':id_manga', $id_manga, PDO::PARAM_INT);
    $stmt->bindParam(':id_avaliacao', $id_avaliacao, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header('Location: exibirAvaliacao.php');
    } else {
        echo 'erro';
    }
    exit;

?>
