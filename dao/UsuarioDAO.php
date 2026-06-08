<?php 

namespace DAO;
use Model\Usuario;
use PDO;
use Util\Conexao;

include_once __DIR__ . "/../util/Conexao.php";

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
        $sql = "INSERT INTO usuarios (nome_completo, endereco, email, senha_hash, telefone) VALUES (?, ?, ?, ?, ?)";
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$usuario->getNomeCompleto(), $usuario->getEndereco(), $usuario->getEmail(), $usuario->getSenha(), $usuario->getTelefone()]);
    }

    public function deletar(int $id): void {
        $sql = "DELETE FROM usuarios WHERE id = ?";
    
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$id]);
    }

    public function encontrarPorEmail(string $email) {
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$email]);

        return $stm->fetch();
    }

    public function verificarCredenciais($email, $senha): bool {
        $usuario = $this->encontrarPorEmail($email);
        if(!$usuario) return false;
        if ($usuario['senha_hash'] !== $senha) return false;

        return true;
    }

    public function acharPorId(int $id): array {
        $sql = "SELECT * FROM usuarios WHERE id = ?";

        $stm = $this->conexao->prepare($sql);
        $stm->execute([$id]);

        return $stm->fetch();
    }
}
