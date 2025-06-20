<?php
    require '../init.php';
    
    $id_manga = isset($_GET['id_manga']) ? (int) $_GET['id_manga'] : null;
    $PDO = db_connect();
    $sql = "SELECT M.id_manga, M.editora, M.titulo, M.autor, M.Categoria_id_categoria, C.genero 
    FROM Manga AS M 
    INNER JOIN Categoria AS C ON C.id_categoria = M.Categoria_id_categoria WHERE id_manga = :id_manga";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id_manga', $id_manga, PDO::PARAM_INT);
    $stmt->execute();
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!is_array($dados)){
        header('Location: exibirManga.php');
    }

    $sql_categoria = "SELECT id_categoria, genero FROM Categoria";
    $stmt_categoria = $PDO->prepare($sql_categoria);
    $stmt_categoria->execute();
    $categoria = $stmt_categoria->fetchAll(PDO::FETCH_ASSOC);
    if (!is_array($categoria)) {
        header('Location: exibirManga.php');
        exit;
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
        <form action="editManga.php" method="post">
            <input type="hidden" name="id_manga" value="<?php echo $id_manga ?>">
            <div class="row">
                <label for="titulo">Título: </label><br>
                <input type="text" id="titulo" name="titulo" value="<?php echo $dados['titulo'] ?>"required><br><br>
                <label for="editora">Editora: </label><br>
                <input type="text" id="editora" name="editora" value="<?php echo $dados['editora'] ?>"required><br><br>
                <label for="autor">Autor: </label><br>
                <input type="text" id="autor" name="autor" value="<?php echo $dados['autor'] ?>"required><br><br>
                <label for="id_categoria">Gênero: </label><br>
                <select name="id_categoria" id="id_categoria" required>
                    <?php foreach ($categoria as $cat): ?>
                        <option value="<?php echo $cat['id_categoria']; ?>"
                            <?php if ($cat['id_categoria'] == $dados['Categoria_id_categoria']) echo 'selected'; ?>>
                            <?php echo $cat['genero']; ?>
                        </option>
                    <?php endforeach; ?>
                </select><br><br>
            <input class="submit" type="submit" value="SALVAR ALTERAÇÕES">
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