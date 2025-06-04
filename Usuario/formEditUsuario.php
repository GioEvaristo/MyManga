<?php
    require '../init.php';
    $id_usuario = isset($_GET['id_usuario']) ? (int) $_GET['id_usuario'] : null;
    $PDO = db_connect();
    $sql = "SELECT nome, email, idade FROM Usuario WHERE id_usuario = :id_usuario";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!is_array($user)){
        header('Loaction: exibirUsuarios.php');
    }
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../assets/logomanga.webp">
    <title>MyMangas</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../stylemymanga.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
      <script type="text/javascript">
            $(document).ready(function(){
                $(function(){
                    $("#menu").load("../Navbar/navbar.html");
                });
            });
        </script>
    </head>
<body>
    <div id="menu"></div>
    
    <div class="container">
        
        </div>
        <form action="editUsuario.php" method="post">
            <p>Editar Usuário</p>
            <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
            <div class="row">
                <label for="nome">Nome: </label><br>
                <input type="text" id="nome" name="nome" value="<?php echo $user['nome'] ?>"required><br><br>
                <label for="email">Email: </label><br>
                <input type="email" id="email" name="email" value="<?php echo $user['email'] ?>"required><br><br>
                <label for="idade">Idade: </label><br>
                <input type="number" id="idade" name="idade" value="<?php echo $user['idade'] ?>"required><br><br>
            <input type="submit" value="CADASTRAR">
            </form>
            </div>
        
    </div>
    
</body>
<footer>
    <div class="container">
        <p><a href="#">Voltar ao topo</a> &copy; MyMangas - Alguns dos direitos reservados ao Pedro Liló - 2025</p>
    </div>
  </footer>
</html>