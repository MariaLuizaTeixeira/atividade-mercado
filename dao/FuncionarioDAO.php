<?php 

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
        $sql = "INSERT INTO funcionarios (id, nome_completo, cargo) VALUES (?, ?, ?)";
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$funcionario->getId(), $funcionario->getNomeCompleto(), $funcionario->getCargo()]);
    }

    public function deletar(int $id): void {
        $sql = "DELETE FROM funcionarios WHERE id = ?";
    
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$id]);
    }
}