<?php
require_once '../init.php';
  $PDO = db_connect();
  $sql = "SELECT A.id_avaliacao, A.titulo AS titulo_avaliacao, A.descricao, A.Usuario_id_usuario, A.Manga_id_manga, U.nome, M.titulo AS titulo_manga 
    FROM Avaliacao AS A INNER JOIN Usuario AS U ON U.id_usuario = A.Usuario_id_usuario 
    INNER JOIN Manga AS M ON M.id_manga = A.Manga_id_manga";
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
    $(document).ready(function () {
      $(function () {
        $("#menu").load("../Navbar/navbar.html");
      });
    });
  </script>
</head>
<div id="menu"></div>
    <main role="main">
      <section class="jumbotron text-center">
        <h2>Avaliações feitas</h2>
      </section>
    <div class="container">
    <table class="table table-ordered table-hover" style="background-color: #ffc37d; font-size: 1.5rem; height: 6rem; width: 320rem;">
        <thead>
            <tr>
                <th style="text-align:center">ID</th>
                <th style="text-align:center">Usuário</th>
                <th style="text-align:center">Título</th>
                <th style="text-align:center">Descrição</th>
                <th style="text-align:center">Mangá</th>
                <th style="text-align:center" colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($avaliacao = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td style="text-align:center"><?php echo $avaliacao['id_avaliacao'] ?></td>
                    <td style="text-align:center"><?php echo $avaliacao['nome'] ?></td>
                    <td style="text-align:center"><?php echo $avaliacao['titulo_avaliacao'] ?></td>
                    <td style="text-align:center"><?php echo $avaliacao['descricao'] ?></td>
                    <td style="text-align:center"><?php echo $avaliacao['titulo_manga'] ?></td>
                    <td style="text-align:center">
                        <a href="formEditAvaliacao.php?id_avaliacao=<?php echo $avaliacao['id_avaliacao'] ?>" class="btn btn-primary" >Editar</a>
                        <a href="deleteAvaliacao.php?id_avaliacao=<?php echo $avaliacao['id_avaliacao'] ?>" onclick="return confirm('Deseja mesmo deletar?')" class="btn btn-danger">Deletar</a>
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
