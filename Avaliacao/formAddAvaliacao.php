<?php
require '../init.php';

  $PDO = db_connect();
  $sqlUsuarios = "SELECT id_usuario, nome FROM Usuario";
  $stmtUsuarios = $PDO->prepare($sqlUsuarios);
  $stmtUsuarios->execute();
  $sqlMangas = "SELECT id_manga, titulo FROM Manga";
  $stmtMangas = $PDO->prepare($sqlMangas);
  $stmtMangas->execute();
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
    <div id="menu">
      
    </div>
    <div class="container">
      <form action="addAvaliacao.php" method="post">
        <label for="usuario">Usuário: </label>
        <select name="id_usuario" id="id_usuario" required>
          <?php while ($usuario = $stmtUsuarios->fetch(PDO::FETCH_ASSOC)): ?>
            <option value="<?php echo $usuario['id_usuario']; ?>"><?php echo $usuario['nome']; ?></option>
          <?php endwhile; ?>
        </select>
        <label for="titulo">Título: </label>
        <input type="text" id="titulo" name="titulo" required>
        <label for="descricao">Descrição: </label>
        <input type="text" id="descricao" name="descricao" required>
        <label for="manga">Mangá: </label>
        <select name="id_manga" id="id_manga" required>
          <?php while ($manga = $stmtMangas->fetch(PDO::FETCH_ASSOC)): ?>
            <option value="<?php echo $manga['id_manga']; ?>"><?php echo $manga['titulo']; ?></option>
          <?php endwhile; ?>
        </select><br>
        <input class="submit" type="submit" value="CADASTRAR">
      </form>
    </div>
  </body>
  <footer>
    <div class="container">
        <p><a href="#">Voltar ao topo</a> &copy; MyMangas - Alguns dos direitos reservados ao Pedro Liló - 2025</p>
    </div>
  </footer>
</html>