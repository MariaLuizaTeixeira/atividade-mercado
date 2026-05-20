<?php 

use Model\Cliente;

class ClienteDAO {

    private PDO $conexao;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }
    
    public function listar(): array {
        $sql = "SELECT * FROM clientes";
        $stm = $this->conexao->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function criar(Cliente $cliente): void {
        $sql = "INSERT INTO clientes (id, nome_completo, endereco) VALUES (?, ?, ?)";
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$cliente->getId(), $cliente->getNomeCompleto(), $cliente->getEndereco()]);
    }

    public function deletar(int $id): void {
        $sql = "DELETE FROM clientes WHERE id = ?";
    
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$id]);
    }
}