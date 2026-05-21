<?php 

namespace DAO;
use Model\Cliente;
use Util\Conexao;

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
        $sql = "INSERT INTO clientes (id, nome_completo, endereco, email, senha_hash, telefone) VALUES (?, ?, ?, ?, ?, ?)";
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$cliente->getId(), $cliente->getNomeCompleto(), $cliente->getEndereco()], $cliente->getEmail(), $cliente->getSenha(), $cliente->getTelefone());
    }

    public function deletar(int $id): void {
        $sql = "DELETE FROM clientes WHERE id = ?";
    
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$id]);
    }
}