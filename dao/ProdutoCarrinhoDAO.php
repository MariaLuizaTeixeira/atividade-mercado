<?php

namespace DAO;

use Util\Conexao;
use PDO;

require_once __DIR__ . '/../util/Conexao.php';

class ProdutoCarrinhoDAO {
    private ?PDO $conexao;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    public function acharProdutoPorId(int $cartId, int $produtoId): ?array {
        $sql = "SELECT * FROM cart_items
                WHERE cart_id = ?
                AND produtos_id = ?";

        $stm = $this->conexao->prepare($sql);
        $stm->execute([$cartId, $produtoId]);

        $produto = $stm->fetch();

        if ($produto)
            return $produto;
        return null;
    }

    public function salvarProduto(int $cartId, int $produtoId, int $quantidade): void {
            $sql = "INSERT INTO cart_items
            (cart_id, produtos_id, quantity)
            VALUES (?, ?, ?)";

        $stm = $this->conexao->prepare($sql);
        $stm->execute([
            $cartId,
            $produtoId,
            $quantidade
        ]);
    }

}