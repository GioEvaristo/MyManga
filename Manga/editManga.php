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
        header('Loaction: exibirManga.php');
    }

    $sql_categoria = "SELECT id_categoria, genero FROM Categoria";
    $stmt_categoria = $PDO->prepare($sql_categoria);
    $stmt_categoria->execute();
    $categoria = $stmt_categoria->fetchAll(PDO::FETCH_ASSOC);


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titulo = $_POST['titulo'];
        $editora = $_POST['editora'];
        $autor = $_POST['autor'];
        $id_categoria = $_POST['id_categoria'];
        $id_manga = $_POST['id_manga'];

        $update_sql = "UPDATE Manga SET titulo = :titulo, editora = :editora, autor = :autor, Categoria_id_categoria = :id_categoria WHERE id_manga = :id_manga";
        $stmt_update = $PDO->prepare($update_sql);
        $stmt_update->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt_update->bindParam(':editora', $editora, PDO::PARAM_STR);
        $stmt_update->bindParam(':autor', $autor, PDO::PARAM_STR);
        $stmt_update->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
        $stmt_update->bindParam(':id_manga', $id_manga, PDO::PARAM_INT);

        if ($stmt_update->execute()) {
            header('Location: exibirManga.php');
            exit;
        } else {
            echo "Erro.";
        }
    }
?>