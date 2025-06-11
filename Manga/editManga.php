<?php
    require '../init.php';
        
    $id_manga = isset($_POST['id_manga']) ? (int) $_POST['id_manga'] : null;
    $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : null;
    $editora = isset($_POST['editora']) ? $_POST['editora'] : null;
    $autor = isset($_POST['autor']) ? $_POST['autor'] : null;
    $id_categoria = isset($_POST['id_categoria']) ? (int) $_POST['id_categoria'] : null;

    $PDO = db_connect();
    if (empty($id_manga) || empty($titulo) || empty($editora) || empty($autor)) {
        header('Location: exibirManga.php');
        exit;
    }

    $update_sql = "UPDATE Manga SET titulo = :titulo, editora = :editora, autor = :autor, Categoria_id_categoria = :id_categoria WHERE id_manga = :id_manga";
    $stmt_update = $PDO->prepare($update_sql);
    $stmt_update->bindParam(':titulo', $titulo, PDO::PARAM_STR);
    $stmt_update->bindParam(':editora', $editora, PDO::PARAM_STR);
    $stmt_update->bindParam(':autor', $autor, PDO::PARAM_STR);
    $stmt_update->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
    $stmt_update->bindParam(':id_manga', $id_manga, PDO::PARAM_INT);

    if ($stmt_update->execute()) {
        header('Location: exibirManga.php');
    } else {
        echo 'erro';
    }
    exit;

    
?>
