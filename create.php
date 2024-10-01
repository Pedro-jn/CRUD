<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Criar Nova Nota</title>
</head>
<body>
    <h1>Criar Nova Nota</h1>
    <form method="POST" action="create.php">
    
        

        <label for="categoria_notas">Categoria:</label><br>
        <input type="text" name="categoria_notas" id="categoria_notas" required><br><br>

        <label for="conteudo_notas">Conteúdo:</label><br>
        <textarea name="conteudo_notas" id="conteudo_notas" required></textarea><br><br>

        <button type="submit">Salvar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $categoria_notas = $_POST['categoria_notas'];
        $conteudo_notas = $_POST['conteudo_notas'];

        if (isset($pdo)) {
            $stmt = $pdo->prepare("INSERT INTO notas (conteudo_notas, categoria_notas) VALUES (?, ?)");
            $stmt->execute([$conteudo_notas, $categoria_notas]);

            echo "<p>Nota salva com sucesso!</p>";
        } else {
            echo "<p>Erro na conexão com o banco de dados.</p>";
        }
        echo "<a href='index.php'>Voltar</a>";
    }
    ?>
</body>
</html>
