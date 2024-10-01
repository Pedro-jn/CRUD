<?php include 'db.php'; ?>


<!DOCTYPE html>
<html>
<head>
    <title>Bloco de Notas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Bloco de Notas</h1>
   


 
    <a href="create.php"> <img class="botao"src="https://cdn-icons-png.flaticon.com/512/16/16057.png"Criar Nova Nota</a>
    <ul>
        <?php
        $stmt = $pdo->query("SELECT id, nome_notas, categoria_notas FROM notas ORDER BY id DESC");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<li><a href='view.php?id=" . $row['id'] . "'>" . htmlspecialchars($row['nome_notas']) . " (" . htmlspecialchars($row['categoria_notas']) . ")</a></li>";
        }
        ?>
    </ul>
</body>
</html>

