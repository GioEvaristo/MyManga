<?php
require_once '../init.php';

$id_avaliacao = isset($_GET['id_avaliacao']) ? $_GET['id_avaliacao'] : null;

if (empty($id_avaliacao)) {
    echo "ID não informado";
    exit;
}

$PDO = db_connect();
$sql = "DELETE FROM Avaliacao WHERE id_avaliacao = :id_avaliacao";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id_avaliacao', $id_avaliacao, PDO::PARAM_INT);

if ($stmt->execute()) {
    header('Location: exibirAvaliacao.php');
} else {
    echo "Erro ao remover";
    print_r($stmt->errorInfo());
}
?>