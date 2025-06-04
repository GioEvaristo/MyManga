<?php
require_once '../init.php';

$id_categoria = $_POST['id_categoria'];
$genero = $_POST['genero'];
$classif_indicativa = $_POST['classif_indicativa'];

$PDO = db_connect();
$sql = "UPDATE Categoria SET genero = :genero, classif_indicativa = :classif_indicativa WHERE id_categoria = :id_categoria";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
$stmt->bindParam(':genero', $genero);
$stmt->bindParam(':classif_indicativa', $classif_indicativa);

if ($stmt->execute()) {
    header('Location: exibirCategoria.php');
} else {
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}
?>