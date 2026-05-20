CREATE TABLE produtos (
    id             INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome           TEXT NOT NULL,
    descricao      TEXT NOT NULL,
    setor          TEXT CHECK (setor IN ('Higiene e Limpeza', 'Hortifruti', 'Açougue E Peixaria', 'Padaria e Confeitaria', 'Frios e Laticínios', 'Congelados', 'Bebidas', 'Mercearia')),
    preco          DOUBLE NOT NULL,
    imagem         TEXT
);

CREATE TABLE usuarios (
    id                INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome_completo     TEXT NOT NULL,
);

CREATE TABLE funcionarios (
    id           INTEGER NOT NULL PRIMARY KEY,
    nome_completo TEXT NOT NULL,
    cargo        TEXT CHECK (funcao IN ('Operador de caixa', 'Empacotador', 'Repositor', 'Atendente de SAC', 'Padeiro', 'Açougueiro', 'Estoquista', 'Motorista', 'Zelador', 'Auxiliar administrativo', 'Gerente')),

    CONSTRAINT fk_id_funcionario FOREIGN KEY (id) REFERENCES usuario (id),
    CONSTRAINT fk_nome_funcionario FOREIGN KEY (nome_completo) REFERENCES usuario (nome_completo)
);

CREATE TABLE clientes (
    id           INTEGER NOT NULL PRIMARY KEY,
    nome_completo TEXT NOT NULL,
    endereco     TEXT,
    
    CONSTRAINT fk_cliente FOREIGN KEY (id) REFERENCES usuario (id),
    CONSTRAINT fk_nome_funcionario FOREIGN KEY (nome_completo) REFERENCES usuario (nome_completo)
);