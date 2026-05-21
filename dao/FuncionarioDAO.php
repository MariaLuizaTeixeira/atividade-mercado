<?php

namespace DAO;
use Model\Funcionario;

class FuncionarioDAO {

    private PDO $conexao;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }
    
    public function listar(): array {
        $sql = "SELECT * FROM funcionarios";
        $stm = $this->conexao->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function criar(Funcionario $funcionario): void {
        $sql = "INSERT INTO funcionarios (id, nome_completo, cargo, email, senha_hash, telefone) VALUES (?, ?, ?, ?, ?, ?)";
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$funcionario->getId(), $funcionario->getNomeCompleto(), $funcionario->getCargo()], $funcionario->getEmail(), $funcionario->getSenha(), $funcionario->getTelefone());
    }

    public function deletar(int $id): void {
        $sql = "DELETE FROM funcionarios WHERE id = ?";
    
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$id]);
    }
}