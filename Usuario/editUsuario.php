<?php
require_once '../init.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$idade = $_POST['idade'];

$PDO = db_connect();
$sql = "UPDATE Usuarios SET nome = :nome, email = :email, idade = :idade WHERE id_usuario = :id_usuario";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':idade', $idade);
$stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);

if ($stmt->execute()) {
    header('Location: exibir.php');
} else {
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}
?>