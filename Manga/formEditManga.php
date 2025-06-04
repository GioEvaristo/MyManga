<?php
    require '../init.php';
    $id_manga = isset($_GET['id_manga']) ? (int) $_GET['id_manga'] : null;
    $PDO = db_connect();
    $sql = "SELECT titulo, editora, autor FROM Manga WHERE id_manga = :id_manga";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id_manga', $id_manga, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!is_array($user)){
        header('Loaction: exibirMangas.php');
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
            <p>Editar Mangá</p>
            <input type="hidden" name="id_manga" value="<?php echo $id_manga ?>">
            <div class="row">
                <label for="titulo">Nome: </label><br>
                <input type="text" id="titulo" name="titulo" value="<?php echo $user['titulo'] ?>"required><br><br>
                <label for="editora">Email: </label><br>
                <input type="text" id="editora" name="editora" value="<?php echo $user['editora'] ?>"required><br><br>
                <label for="autor">Idade: </label><br>
                <input type="text" id="autor" name="autor" value="<?php echo $user['autor'] ?>"required><br><br>
            <input type="submit" value="SALVAR ALTERAÇÕES">
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