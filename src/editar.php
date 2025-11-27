<?php 
include 'conexao.php';
include 'utils.php';

// Verifica ID
if (!isset($_GET['id'])) {
    die("ID da tarefa não informado.");
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    die("ID inválido.");
}

// Busca a tarefa no banco
$sql = "SELECT * FROM tarefas WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->execute([$id]);
$tarefa = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$tarefa) {
    die("Tarefa não encontrada.");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarefa</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h2>Editar Tarefa</h2>

<!-- Mensagem de erro -->
<?php if (!empty($_GET['erro'])): ?>
    <div class="erro-box">
        <?= nl2br(e($_GET['erro'])) ?>
    </div>
<?php endif; ?>

<form action="../actions/processa_editar.php?id=<?= $tarefa['id'] ?>" method="POST">

    <label>Título:</label><br>
    <input type="text" name="titulo" value="<?= e($_GET['titulo'] ?? $tarefa['titulo']) ?>" required><br><br>

    <label>Descrição:</label><br>
    <textarea name="descricao"><?= e($_GET['descricao'] ?? $tarefa['descricao']) ?></textarea><br><br>

    <label>Data de vencimento:</label><br>
    <input type="date" name="data_vencimento" 
           value="<?= e($_GET['data_vencimento'] ?? $tarefa['data_vencimento']) ?>" required><br><br>

    <label>Prioridade:</label><br>
    <select name="prioridade" required>
        <?php 
            $p_valor = $_GET['prioridade'] ?? $tarefa['prioridade'];
        ?>
        <option value="baixa" <?= $p_valor == "baixa" ? "selected" : "" ?>>Baixa</option>
        <option value="media" <?= $p_valor == "media" ? "selected" : "" ?>>Média</option>
        <option value="alta" <?= $p_valor == "alta" ? "selected" : "" ?>>Alta</option>
    </select><br><br>

    <label>Status:</label><br>
    <select name="status" required>
        <?php 
            $s_valor = $_GET['status'] ?? $tarefa['status'];
        ?>
        <option value="pendente" <?= $s_valor == "pendente" ? "selected" : "" ?>>Pendente</option>
        <option value="em andamento" <?= $s_valor == "em andamento" ? "selected" : "" ?>>Em andamento</option>
        <option value="concluida" <?= $s_valor == "concluida" ? "selected" : "" ?>>Concluída</option>
    </select><br><br>

    <button type="submit">Salvar Alterações</button>
</form>

<a href="index.php" class="btn-voltar">Voltar</a>

</body>
</html>
