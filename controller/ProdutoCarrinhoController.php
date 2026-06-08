<?php

namespace Controller;

use DAO\ProdutoCarrinhoDAO;

require_once __DIR__ . '/../dao/ProdutoCarrinhoDAO.php';

class ProdutoCarrinhoController {
    private ProdutoCarrinhoDAO $produtoCarrinhoDAO;

    public function __construct(){
        $this->produtoCarrinhoDAO = new ProdutoCarrinhoDAO();
    }

    public function listarProdutos($cardId, $produtoId) {

    }

    public function acharProdutoPorId(int $cartId, int $produtoId): ?array {
        return $this->produtoCarrinhoDAO->acharProdutoPorId($cartId, $produtoId);
    }

    public function salvarProduto(int $cartId, int $produtoId, int $quantidade) {
        return $this->produtoCarrinhoDAO->salvarProduto($cartId, $produtoId, $quantidade);
    }

}