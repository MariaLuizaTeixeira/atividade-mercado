<?php

namespace DAO;
use Model\Carrinho;
use Model\Usuario;
use Util\Conexao;
use PDO;

require_once __DIR__ . '/../util/Conexao.php';

class CarrinhoDAO {
    private ?PDO $conexao;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    public function criar(Usuario $usuario): void {
        $sql = "INSERT INTO carts (user_id) VALUES (?)";
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$usuario->getId()]);
    }

    public function acharPorId(int $id): array {
        $sql = "SELECT * FROM carrinhos WHERE id = ?";
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$id]);
        return $stm->fetch();
    }
}