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
    <body>
      <div class="container">
          <form action="addManga.php" method="post">
          <label for="titulo">Título: </label><br>
          <input type="text" id="titulo" name="titulo" required><br><br>
          <label for="editora">Editora: </label><br>
          <input type="text" id="editora" name="editora" required><br><br>
          <label for="autor">Autor: </label><br>
          <input type="text" id="autor" name="autor" required><br><br>
          <input type="submit" value="CADASTRAR">
    </form>
    </div>
  </body>
  <footer>
    <div class="container">
        <p><a href="#">Voltar ao topo</a> &copy; MyMangas - Alguns dos direitos reservados ao Pedro Liló - 2025</p>
    </div>
  </footer>
</html>