<?php
require '../init.php';

    $id_avaliacao = isset($_GET['id_avaliacao']) ? (int) $_GET['id_avaliacao'] : null;
    $PDO = db_connect();
    $sql = "SELECT A.id_avaliacao, A.titulo AS titulo_avaliacao, A.descricao, A.Usuario_id_usuario, A.Manga_id_manga, U.nome, M.titulo AS titulo_manga 
            FROM Avaliacao AS A INNER JOIN Usuario AS U ON U.id_usuario = A.Usuario_id_usuario INNER JOIN Manga AS M ON M.id_manga = A.Manga_id_manga 
            WHERE A.id_avaliacao = :id_avaliacao";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id_avaliacao', $id_avaliacao, PDO::PARAM_INT);
    $stmt->execute();
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!is_array($dados)) {
        header('Location: exibirAvaliacao.php');
        exit;
    }

    $sql_usuario = "SELECT id_usuario, nome FROM Usuario";
    $stmt_usuario = $PDO->prepare($sql_usuario);
    $stmt_usuario->execute();
    $usuario = $stmt_usuario->fetchAll(PDO::FETCH_ASSOC);
    if (!is_array($usuario)) {
        header('Location: exibirAvaliacao.php');
        exit;
    }

    $sql_manga = "SELECT id_manga, titulo FROM Manga";
    $stmt_manga = $PDO->prepare($sql_manga);
    $stmt_manga->execute();
    $mangas = $stmt_manga->fetchAll(PDO::FETCH_ASSOC);
    if (!is_array($mangas)) {
        header('Location: exibirAvaliacao.php');
        exit;
    }
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Editar Avaliação</title>
    <link rel="icon" href="../assets/logomanga.webp">
    <link href="../stylemymanga.css" rel="stylesheet">
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#menu").load("../Navbar/navbar.html");
        });
    </script>
  </head>
<body>
  <div id="menu"></div>
  <div class="container">
    <form action="editAvaliacao.php?id_avaliacao=<?php echo $dados['id_avaliacao']; ?>" method="post">
      <input type="hidden" name="id_avaliacao" value="<?php echo $dados['id_avaliacao']; ?>">
      
      <label for="id_usuario">Usuário:</label>
      <select name="id_usuario" id="id_usuario" required>
        <?php foreach ($usuario as $usuarios): ?>
          <option value="<?php echo $usuarios['id_usuario']; ?>" <?php if ($usuarios['id_usuario'] == $dados['Usuario_id_usuario']) echo 'selected'; ?>>
            <?php echo $usuarios['nome']; ?>
          </option>
        <?php endforeach; ?>
      </select><br><br>
      
      <label for="titulo_avaliacao">Título:</label>
      <input type="text" id="titulo_avaliacao" name="titulo_avaliacao" value="<?php echo $dados['titulo_avaliacao']; ?>" required><br><br>
      
      <label for="descricao">Descrição:</label>
      <input type="text" id="descricao" name="descricao" value="<?php echo $dados['descricao']; ?>" required><br><br>
      
      <label for="id_manga">Mangá:</label>
      <select name="id_manga" id="id_manga" required>
        <?php foreach ($mangas as $manga): ?>
          <option value="<?php echo $manga['id_manga']; ?>" <?php if ($manga['id_manga'] == $dados['Manga_id_manga']) echo 'selected'; ?>>
            <?php echo $manga['titulo']; ?>
          </option>
        <?php endforeach; ?>
      </select><br><br>
      
      <input class="submit" type="submit" value="SALVAR ALTERAÇÕES">
    </form>
  </div>
</body>
<footer>
  <div class="container">
      <p><a href="#">Voltar ao topo</a> &copy; MyMangas - Alguns dos direitos reservados ao Pedro Liló - 2025</p>
  </div>
</footer>
</html>
