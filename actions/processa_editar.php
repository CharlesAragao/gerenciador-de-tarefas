<?php
include '../src/conexao.php';
include '../src/utils.php';

// Verifica ID
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    die("ID inválido.");
}

// Apenas POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $erros = [];

    // Validações
    if (empty($_POST['titulo'])) {
        $erros[] = "O título é obrigatório.";
    }

    $prioridades = ['baixa', 'media', 'alta'];
    if (!in_array($_POST['prioridade'], $prioridades)) {
        $erros[] = "Prioridade inválida.";
    }

    $status_validos = ['pendente', 'em andamento', 'concluida'];
    if (!in_array($_POST['status'], $status_validos)) {
        $erros[] = "Status inválido.";
    }

    // Se houver erros, retorna ao formulário preservando dados
    if (!empty($erros)) {

        $query = http_build_query([
            'erro' => implode("\n", $erros),
            'titulo' => $_POST['titulo'],
            'descricao' => $_POST['descricao'],
            'data_vencimento' => $_POST['data_vencimento'],
            'prioridade' => $_POST['prioridade'],
            'status' => $_POST['status']
        ]);

        header("Location: editar.php?id=$id&$query");
        exit;
    }

    // UPDATE
    $sql = "UPDATE tarefas SET 
                titulo = :titulo,
                descricao = :descricao,
                data_vencimento = :data_vencimento,
                prioridade = :prioridade,
                status = :status
            WHERE id = :id";

    $stmt = $conexao->prepare($sql);

    $stmt->execute([
        ':titulo' => $_POST['titulo'],
        ':descricao' => $_POST['descricao'],
        ':data_vencimento' => $_POST['data_vencimento'],
        ':prioridade' => $_POST['prioridade'],
        ':status' => $_POST['status'],
        ':id' => $id
    ]);

    header("Location: ../src/index.php?editado=1");
    exit;
}
