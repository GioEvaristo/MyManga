<?php
    require '../init.php';
    $id_categoria = isset($_GET['id_categoria']) ? (int) $_GET['id_categoria'] : null;
    $PDO = db_connect();
    $sql = "SELECT genero, classif_indicativa FROM Categoria WHERE id_categoria = :id_categoria";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
    $stmt->execute();
    $categoria = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!is_array($categoria)){
        header('Loaction: exibirCategoria.php');
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
        <form action="editCategoria.php" method="post">
            <p>Editar Categoria</p>
            <input type="hidden" name="id_categoria" value="<?php echo $id_categoria ?>">
            <div class="row">
                <label for="genero">Gênero: </label><br>
                <input type="text" id="genero" name="genero" value="<?php echo $categoria['genero'] ?>"required><br><br>
                <label for="classif_indicativa">Classificação Indicativa: </label><br>
                <input type="text" id="classif_indicativa" name="classif_indicativa" value="<?php echo $categoria['classif_indicativa'] ?>"required><br><br>
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