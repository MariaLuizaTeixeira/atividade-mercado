CREATE TABLE produtos (
    id                      BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome                    TEXT NOT NULL,
    descricao               TEXT NOT NULL,
    setor                   TEXT CHECK (setor IN ('Higiene e Limpeza', 'Hortifruti', 'Açougue E Peixaria', 'Padaria e Confeitaria', 'Frios e Laticínios', 'Congelados', 'Bebidas', 'Mercearia'))  NOT NULL,
    preco                   DOUBLE NOT NULL,
    validade                DATE NOT NULL,
    imagem                  TEXT NOT NULL,
    peso                    TEXT NOT NULL,
    marca                   TEXT NOT NULL,
    quantidade_estoque      INTEGER NOT NULL,
    status_estoque          TEXT CHECK (status_estoque IN ('Disponível', 'Poucas unidades', 'Esgotado')) NOT NULL
);

CREATE TABLE usuarios (
    id                BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome_completo     TEXT NOT NULL,
    email             TEXT NOT NULL,
    senha_hash        VARCHAR(255),
    telefone          TEXT
);

CREATE TABLE funcionarios (
    id               BIGINT NOT NULL PRIMARY KEY,
    nome_completo    TEXT NOT NULL,
    cargo            TEXT CHECK (cargo IN ('Operador de caixa', 'Empacotador', 'Repositor', 'Atendente de SAC', 'Padeiro', 'Açougueiro', 'Estoquista', 'Motorista', 'Zelador', 'Auxiliar administrativo', 'Gerente')),
    email            TEXT NOT NULL,
    senha_hash       VARCHAR(255),
    telefone         TEXT,

    CONSTRAINT fk_id_funcionario FOREIGN KEY (id) REFERENCES usuarios (id),
    CONSTRAINT fk_nome_funcionario FOREIGN KEY (nome_completo) REFERENCES usuarios (nome_completo),
    CONSTRAINT fk_email_funcionario FOREIGN KEY (email) REFERENCES usuarios (email),
    CONSTRAINT fk_senha_hash_funcionario FOREIGN KEY (senha_hash) REFERENCES usuarios (senha_hash),
    CONSTRAINT fk_telefone_funcionario FOREIGN KEY (telefone) REFERENCES usuarios (telefone)
);

CREATE TABLE clientes (
    id               BIGINT NOT NULL PRIMARY KEY,
    nome_completo    TEXT NOT NULL,
    endereco         TEXT,
    email            TEXT NOT NULL,
    senha_hash       VARCHAR(255),
    telefone         TEXT,
    
    CONSTRAINT fk_cliente FOREIGN KEY (id) REFERENCES usuarios (id),
    CONSTRAINT fk_nome_cliente FOREIGN KEY (nome_completo) REFERENCES usuarios (nome_completo),
    CONSTRAINT fk_email_cliente FOREIGN KEY (email) REFERENCES usuarios (email),
    CONSTRAINT fk_senha_hash_cliente FOREIGN KEY (senha_hash) REFERENCES usuarios (senha_hash),
    CONSTRAINT fk_telefone_cliente FOREIGN KEY (telefone) REFERENCES usuarios (telefone)
);