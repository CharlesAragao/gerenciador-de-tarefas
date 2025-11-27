-- SQLite
CREATE TABLE IF NOT EXISTS tarefas ( 
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    titulo TEXT NOT NULL,
    descricao TEXT,
    data_criacao DATATIME DEFAULT CURRENT_TIMESTAMP,
    data_vencimento DATE,
    prioridade TEXT CHECK( prioridade IN ('baixa', 'media', 'alta') ),
    status TEXT DEFAULT 'pendente' CHECK( status IN ('pendente', 'em andamento', 'concluida') )
);

