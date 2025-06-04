<?php
require_once '../init.php';

$id_categoria = isset($_GET['id_categoria']) ? $_GET['id_categoria'] : null;

if (empty($id_categoria)) {
    echo "ID não informado";
    exit;
}

$PDO = db_connect();
$sql = "DELETE FROM Categoria WHERE id_categoria = :id_categoria";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);

if ($stmt->execute()) {
    header('Location: exibirCategoria.php');
} else {
    echo "Erro ao remover";
    print_r($stmt->errorInfo());
}
?>