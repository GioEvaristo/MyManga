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

  <<div id="menu"></div>
    <main role="main">
      <section class="jumbotron text-center">
        <h2>Mangás Cadastrados</h2>
      </section>
    <div class="container">
    <table class="table table-ordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Editora</th>
                <th>Autor</th>
                <th style="text-align:center" colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($manga = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $manga['id_manga'] ?></td>
                    <td><?php echo $manga['titulo'] ?></td>
                    <td><?php echo $manga['editora'] ?></td>
                    <td><?php echo $manga['autor'] ?></td>
                    <td>
                        <a href="editManga.php?id=<?php echo $manga['id_manga'] ?>" class="btn btn-primary">Editar</a>
                        <a href="deleteManga.php?id=<?php echo $manga['id_manga'] ?>" onclick="return confirm('Deseja mesmo deletar?')" class="btn btn-danger">Deletar</a>
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
