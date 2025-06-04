<?php
require_once '../init.php';

$id_manga = isset($_GET['id_manga']) ? $_GET['id_manga'] : null;

if (empty($id_manga)) {
    echo "ID não informado";
    exit;
}

$PDO = db_connect();
$sql = "DELETE FROM Manga WHERE id_manga = :id_manga";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id_manga', $id_manga, PDO::PARAM_INT);

if ($stmt->execute()) {
    header('Location: exibirManga.php');
} else {
    echo "Erro ao remover";
    print_r($stmt->errorInfo());
}
?>