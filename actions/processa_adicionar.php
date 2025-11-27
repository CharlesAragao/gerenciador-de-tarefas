<?php
include '../src/conexao.php';
include '../src/utils.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $erros = [];

    // Validações
    if (empty($_POST['titulo'])) {
        $erros[] = "O título é obrigatório.";
    }

    $prioridades = ['baixa','media','alta'];
    if (!in_array($_POST['prioridade'], $prioridades)) {
        $erros[] = "Prioridade inválida.";
    }

    $status = ['pendente','em andamento','concluida'];
    if (!in_array($_POST['status'], $status)) {
        $erros[] = "Status inválido.";
    }

    // Volta para o formulário
    if (!empty($erros)) {

        $query = http_build_query([
            'erro' => implode("\n", $erros),
            'titulo' => $_POST['titulo'],
            'descricao' => $_POST['descricao'],
            'data_vencimento' => $_POST['data_vencimento'],
            'prioridade' => $_POST['prioridade'],
            'status' => $_POST['status']
        ]);

        header("Location: ../src/adicionar.php?$query");
        exit;
    }

    // INSERT
    $sql = "INSERT INTO tarefas (titulo, descricao, data_vencimento, prioridade, status)
            VALUES (:titulo, :descricao, :data_vencimento, :prioridade, :status)";

    $stmt = $conexao->prepare($sql);
    $stmt->execute([
        ':titulo' => $_POST['titulo'],
        ':descricao' => $_POST['descricao'],
        ':data_vencimento' => $_POST['data_vencimento'],
        ':prioridade' => $_POST['prioridade'],
        ':status' => $_POST['status']
    ]);

    header("Location: ../src/index.php?sucesso=1");
    exit;
}
