<?php
    require 'init.php';
    $id = isset($_GET['id']) ? (int) $_GET['id'] : null;
    $PDO = db_connect();
    $sql = "SELECT nome, email. idade FROM Usuários WHERE id = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!is_array($user)){
        header('Loaction: exibirUsuarios.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/assets/logomanga.webp">
    <title>MyMangas</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../stylemymanga.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h4>Editar Usuario</h4>
        </div>
        <form action="editUsuario.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">Nome: </label>
                        <input type="text" class="form-control col-sm" name="nome" value="<?php echo $user['nome'] ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="text" class="form-control col-sm" name="email" value="<?php echo $user['email'] ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="idade">Idade: </label>
                        <input type="integer" class="form-control col-sm" name="idade" value="<?php echo $user['idade'] ?>" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Atualizar dados</button>
            </div>
        </form>

    </div>
    
</body>
</html>