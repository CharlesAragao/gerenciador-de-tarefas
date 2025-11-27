<?php
try {
    $caminhoBanco = __DIR__ . "/../src/database.db"; 
    $conexao = new PDO("sqlite:" . $caminhoBanco);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Erro ao conectar: " . $e->getMessage();
    exit;
}
