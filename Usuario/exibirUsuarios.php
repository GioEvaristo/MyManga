<?php
    require_once 'init.php';
    $PDO = db_connect();
    $sql = "SELECT id, nome, email, idade FROM Usuários ORDER BY nome ASC";
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
?>

<!doctype html>
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

    </script>
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light fixed-top" style="background-color: #f0b03f;">
            <img src="assets/myMangas.png" alt="MyMangas" width="200" height="100">
            <a class="navbar-brand" href="../Avaliacao/addAvaliacao.php">Avaliar</a>
            <a class="navbar-brand" href="../Manga/addManga.php">Adicionar Mangá</a>
            <a class="navbar-brand" href="../Categoria/exibirCategoria.php">Categorias</a>
            <a class="navbar-brand" href="./Usuario/addUsuario.php">Cadastrar</a>
          </nav>
    </header>

    <main role="main">
      <section class="jumbotron text-center">
        <h2>Usuários cadastrados</h2>
      </section>
    <div class="container">
    <table class="table table-ordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Idade</th>
                <th style="text-align:center" colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $user['id'] ?></td>
                    <td><?php echo $user['nome'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td><?php echo $user['idade'] ?></td>
                    <td>
                        <a href="editUsuario.php?id=<?php echo $user['id'] ?>" class="btn btn-primary">Editar</a>
                        <a href="deleteUsuario.php?id=<?php echo $user['id'] ?>" onclick="return confirm('Deseja mesmo deletar?')" class="btn btn-danger">Deletar</a>
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
