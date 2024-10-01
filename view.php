<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Visualizar Nota</title>
</head>
<body>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $pdo->prepare("SELECT nome_notas, categoria_notas, conteudo_notas FROM notas WHERE id = ?");
        $stmt->execute([$id]);
        $nota = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($nota) {
            echo "<h1>" . htmlspecialchars($nota['nome_notas']) . "</h1>";
            echo "<p><strong>Categoria:</strong> " . htmlspecialchars($nota['categoria_notas']) . "</p>";
            echo "<p>" . nl2br(htmlspecialchars($nota['conteudo_notas'])) . "</p>";
        } else {
            echo "<p>Nota não encontrada.</p>";
        }
    } else {
        echo "<p>ID inválido.</p>";
    }
    ?>
    <a href="edit.php"> edite sua nota</a>
    <a href="index.php">Voltar</a>
    <a href="delete.php" > delete sua nota</a>
</body>
</html>
