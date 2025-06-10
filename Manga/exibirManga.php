<?php
    require_once '../init.php';
    $PDO = db_connect();
    $sql = "SELECT M.id_manga, M.editora, M.titulo, M.autor, M.Categoria_id_categoria, C.genero 
    FROM Manga AS M 
    INNER JOIN Categoria AS C ON C.id_categoria = M.Categoria_id_categoria 
    ORDER BY M.id_manga ASC";
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
        <h2>Mangás cadastrados</h2>
      </section>
    <div class="container">
    <table class="table table-ordered table-hover" style="background-color: #ffc37d; font-size: 1.5rem; height: 6rem; width: 320rem;">
        <thead>
            <tr>
                <th style="text-align:center">ID</th>
                <th style="text-align:center">Editora</th>
                <th style="text-align:center">Título</th>
                <th style="text-align:center">Autor</th>
                <th style="text-align:center">Gênero</th>
                <th style="text-align:center" colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td style="text-align:center"><?php echo $user['id_manga'] ?></td>
                    <td style="text-align:center"><?php echo $user['editora'] ?></td>
                    <td style="text-align:center"><?php echo $user['titulo'] ?></td>
                    <td style="text-align:center"><?php echo $user['autor'] ?></td>
                    <td style="text-align:center"><?php echo $user['genero'] ?></td>
                    <td style="text-align:center">
                        <a href="formEditManga.php?id_manga=<?php echo $user['id_manga'] ?>" class="btn btn-primary" >Editar</a>
                        <a href="deleteManga.php?id_manga=<?php echo $user['id_manga'] ?>" onclick="return confirm('Deseja mesmo deletar?')" class="btn btn-danger">Deletar</a>
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
