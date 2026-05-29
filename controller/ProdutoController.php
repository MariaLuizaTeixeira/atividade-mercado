<?php

namespace Controller;
use DAO\ProdutoDAO;
use Model\Produto;

require_once __DIR__ . '/../DAO/ProdutoDAO.php';

class ProdutoController {
    private ProdutoDAO $produtoDAO;

    public function __construct(){
        $this->produtoDAO = new ProdutoDAO();
    }

    public function listarAleatoriamente(): array {
        return $this->produtoDAO->listarAleatoriamente();
    }

    public function criar(Produto $produto): void {
        $this->produtoDAO->criar($produto);
    }

    public function deletar(int $id): void {
        $this->produtoDAO->deletar($id);
    }
}