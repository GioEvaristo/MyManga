<?php
require_once '../init.php';

$id_usuario = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : null;

if (empty($id_usuario)) {
    echo "ID não informado";
    exit;
}

$PDO = db_connect();
$sql = "DELETE FROM Usuario WHERE id_usuario = :id_usuario";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);

if ($stmt->execute()) {
    header('Location: exibirUsuarios.php');
} else {
    echo "Erro ao remover";
    print_r($stmt->errorInfo());
}
?>