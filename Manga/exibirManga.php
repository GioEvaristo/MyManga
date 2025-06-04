<?php
    require_once '../init.php';
    $PDO = db_connect();
    $sql = "SELECT id_usuario, nome, email, idade FROM Usuario ORDER BY id_usuario ASC";
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
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
 <div id="menu"></div>
    <main role="main">
      <section class="jumbotron text-center">
        <h2>Usuários cadastrados</h2>
      </section>
    <div class="container">
    <table class="table table-ordered table-hover" style="background-color: #ffc37d; font-size: 1.5rem; height: 6rem; width: 320rem;">
        <thead>
            <tr>
                <th style="text-align:center">ID</th>
                <th style="text-align:center">Nome</th>
                <th style="text-align:center">Email</th>
                <th style="text-align:center">Idade</th>
                <th style="text-align:center" colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td style="text-align:center"><?php echo $user['id_usuario'] ?></td>
                    <td style="text-align:center"><?php echo $user['nome'] ?></td>
                    <td style="text-align:center"><?php echo $user['email'] ?></td>
                    <td style="text-align:center"><?php echo $user['idade'] ?></td>
                    <td style="text-align:center">
                        <a href="formEditUsuario.php?id_usuario=<?php echo $user['id_usuario'] ?>" class="btn btn-primary" >Editar</a>
                        <a href="deleteUsuario.php?id_usuario=<?php echo $user['id_usuario'] ?>" onclick="return confirm('Deseja mesmo deletar?')" class="btn btn-danger">Deletar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
        </tbody>
    </table>

    </div>
    </main>
    <footer>
      <div class="container">
          <p><a href="#">Voltar ao topo</a> &copy; MyMangas - Alguns dos direitos reservados ao Pedro Liló - 2025</p>
      </div>
    </footer>

  </body>
</html>
