<?php

namespace DAO;

use Util\Conexao;
use PDO;

require_once __DIR__ . '/../util/Conexao.php';

class CarrinhoDAO {
    private ?PDO $conexao;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    public function criar(int $usuarioId): void {
        $sql = "INSERT INTO carts (user_id) VALUES (?)";
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$usuarioId]);
    }

    public function acharPorId(int $id): array {
        $sql = "SELECT * FROM carts WHERE id = ?";
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$id]);
        return $stm->fetch();
    }

    public function acharPorUsuarioId(int $usuarioId): ?array {
        $sql = "SELECT * FROM carts WHERE user_id = ?";
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$usuarioId]);

        $carrinho = $stm->fetch();

        if ($carrinho)
            return $carrinho;

        return null;
    }
}