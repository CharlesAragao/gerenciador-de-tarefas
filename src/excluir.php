<?php
include 'conexao.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    die("ID inválido.");
}

$sql = "DELETE FROM tarefas WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->execute([$id]);

header("Location: index.php?excluido=1");
exit();
?>
