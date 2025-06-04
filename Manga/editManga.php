<?php
require_once '../init.php';

$id_manga = $_POST['id_manga'];
$editora = $_POST['editora'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];

$PDO = db_connect();
$sql = "UPDATE Manga SET editora = :editora, titulo = :titulo, autor = :autor WHERE id_manga = :id_manga";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id_manga', $id_manga, PDO::PARAM_INT);
$stmt->bindParam(':editora', $editora);
$stmt->bindParam(':titulo', $titulo);
$stmt->bindParam(':autor', $autor);

if ($stmt->execute()) {
    header('Location: exibirManga.php');
} else {
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}
?>