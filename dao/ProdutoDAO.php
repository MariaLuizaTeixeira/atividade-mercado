<?php 

use Model\Produto;

class ProdutoDAO {

    private PDO $conexao;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }
    
    public function listar(): array {
        $sql = "SELECT * FROM produtos";
        $stm = $this->conexao->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function criar(Produto $produto): void {
        $sql = "INSERT INTO produtos (id, nome) VALUES (?, ?)";
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$produto->getId(), $produto->getEndereco()]);
    }

    public function deletar(int $id): void {
        $sql = "DELETE FROM produtos WHERE id = ?";
    
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$id]);
    }
}