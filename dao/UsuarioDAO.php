<?php 

namespace DAO;
use Model\Usuario;
use Util\Conexao;

class UsuarioDAO {
    private PDO $conexao;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }
    
    public function listar(): array {
        $sql = "SELECT * FROM usuarios";
        $stm = $this->conexao->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function criar(Usuario $usuario): void {
        $sql = "INSERT INTO usuarios (id, nome_completo, endereco, email, senha_hash, telefone) VALUES (?, ?, ?, ?, ?, ?)";
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$usuario->getId(), $usuario->getNomeCompleto(), $usuario->getEndereco(), $usuario->getEmail(), $usuario->getSenha(), $usuario->getTelefone()]);
    }

    public function deletar(int $id): void {
        $sql = "DELETE FROM usuarios WHERE id = ?";
    
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$id]);
    }
}