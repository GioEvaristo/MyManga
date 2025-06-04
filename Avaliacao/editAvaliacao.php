<?php
require_once '../init.php';

$id_usuario = $_POST['id_usuario'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$idade = $_POST['idade'];

$PDO = db_connect();
$sql = "UPDATE Usuario SET nome = :nome, email = :email, idade = :idade WHERE id_usuario = :id_usuario";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':idade', $idade);

if ($stmt->execute()) {
    header('Location: exibirUsuarios.php');
} else {
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}
?>