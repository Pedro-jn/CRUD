<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Buscar os dados da nota a ser editada
    $stmt = $pdo->prepare("SELECT * FROM notas WHERE id = ?");
    $stmt->execute([$id]);
    $nota = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$nota) {
        echo "Nota não encontrada.";
        exit();
    }
} else {
    echo "ID inválido.";
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $categoria_notas = $_POST['categoria_notas'];
    $conteudo_notas = $_POST['conteudo_notas'];

    $stmt = $pdo->prepare("UPDATE notas SET , categoria_notas = ?, conteudo_notas = ? WHERE id = ?");
    $stmt->execute([$categoria_notas, $conteudo_notas, $id]);

    echo "<p>Nota atualizada</p>";
    echo "<a href='index.php'>Voltar</a>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Nota</title>
</head>
<body>
    <h1>Editar Nota</h1>
    <form method="POST">
        

        <label for="categoria_notas">Categoria:</label><br>
        <input type="text" name="categoria_notas" id="categoria_notas" value="<?php echo htmlspecialchars($nota['categoria_notas']); ?>" required><br><br>

        <label for="conteudo_notas">Conteúdo:</label><br>
        <textarea name="conteudo_notas" id="conteudo_notas" required><?php echo htmlspecialchars($nota['conteudo_notas']); ?></textarea><br><br>

        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>
