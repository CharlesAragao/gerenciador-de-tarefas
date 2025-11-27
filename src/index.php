<?php 
include 'conexao.php';
include 'utils.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tarefas</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<?php if (isset($_GET['sucesso'])): ?>
    <div class="alert success-add">Tarefa cadastrada com sucesso!</div>
<?php endif; ?>

<?php if (isset($_GET['editado'])): ?>
    <div class="alert success-edit">Tarefa editada com sucesso!</div>
<?php endif; ?>

<?php if (isset($_GET['excluido'])): ?>
    <div class="alert error-delete">Tarefa excluída.</div>
<?php endif; ?>

<h1>Minhas Tarefas</h1>

<a href="adicionar.php" class="btn">Adicionar Nova Tarefa</a>

<table>
    <tr>
        <th>Título</th>
        <th>Descrição</th>
        <th>Vencimento</th>
        <th>Prioridade</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>

    <?php
    // Buscar tarefas com PDO
    $sql = "SELECT * FROM tarefas ORDER BY id DESC";
    $stmt = $conexao->query($sql);

    while ($tarefa = $stmt->fetch(PDO::FETCH_ASSOC)):
    ?>
        <tr>
            <td><?= e($tarefa['titulo']) ?></td>
            <td><?= e($tarefa['descricao']) ?></td>
            <td><?= e($tarefa['data_vencimento']) ?></td>

            <td class="prioridade <?= e($tarefa['prioridade']) ?>"> 
                <?= ucfirst(e($tarefa['prioridade'])) ?>
            </td>

            <td><?= e($tarefa['status']) ?></td>

            <td>
                <a href="editar.php?id=<?= $tarefa['id'] ?>">Editar</a> |
                <a href="excluir.php?id=<?= $tarefa['id'] ?>" onclick="return confirm('Excluir esta tarefa?');">Excluir</a>
            </td>
        </tr>
    <?php endwhile; ?>
        
</table>

<footer class="footer">
    © <?php echo date("Y"); ?> - Desenvolvido por Charles Aragão
</footer>

<script>
    // Removedor alertas após alguns segundos
    setTimeout(function() {
        let alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            alert.style.opacity = "0";
            alert.style.transition = "opacity 0.8s ease";
            setTimeout(() => alert.remove(), 800);
        });
    }, 3000);
</script>

</body>
</html>
