<?php

namespace Controller;
use DAO\ProdutoDAO;
use Model\Produto;

class ProdutoController {
    private ProdutoDAO $produtoDAO;

    public function __construct(){
        $this->produtoDAO = new ProdutoDAO();
    }

    public function listar(): array {
        return $this->produtoDAO->listar();
    }

    public function criar(Produto $produto): void {
        $this->produtoDAO->criar($produto);
    }

    public function deletar(int $id): void {
        $this->produtoDAO->deletar($id);
    }
}