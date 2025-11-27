<?php 
include 'utils.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Tarefa</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h2>Adicionar Nova Tarefa</h2>

<!-- Mensagens de erro vinda do GET -->
<?php if (!empty($_GET['erro'])): ?>
    <div class="erro-box">
        <?= nl2br(e($_GET['erro'])) ?>
    </div>
<?php endif; ?>

<form action="../actions/processa_adicionar.php" method="POST">

    <label>Título:</label><br>
    <input type="text" name="titulo" value="<?= e($_GET['titulo'] ?? '') ?>" required><br><br>

    <label>Descrição:</label><br>
    <textarea name="descricao"><?= e($_GET['descricao'] ?? '') ?></textarea><br><br>

    <label>Data de vencimento:</label><br>
    <input type="date" name="data_vencimento" value="<?= e($_GET['data_vencimento'] ?? '') ?>" required><br><br>

    <label>Prioridade:</label><br>
    <select name="prioridade" required>
        <option value="">Selecione</option>
        <option value="baixa"  <?= isset($_GET['prioridade']) && $_GET['prioridade']=='baixa' ? 'selected' : '' ?>>Baixa</option>
        <option value="media"  <?= isset($_GET['prioridade']) && $_GET['prioridade']=='media' ? 'selected' : '' ?>>Média</option>
        <option value="alta"   <?= isset($_GET['prioridade']) && $_GET['prioridade']=='alta' ? 'selected' : '' ?>>Alta</option>
    </select><br><br>

    <label>Status:</label>
    <select name="status" required>
        <option value="pendente"      <?= (($_GET['status'] ?? '')=='pendente') ? 'selected' : '' ?>>Pendente</option>
        <option value="em andamento"  <?= (($_GET['status'] ?? '')=='em andamento') ? 'selected' : '' ?>>Em andamento</option>
        <option value="concluida"     <?= (($_GET['status'] ?? '')=='concluida') ? 'selected' : '' ?>>Concluída</option>
    </select>
    <br><br>

    <button type="submit">Cadastrar</button>
</form>

<a href="index.php" class="btn-voltar">Voltar</a>

</body>
</html>
