<?php

namespace Controller;
use DAO\ProdutoDAO;
use Model\Produto;

require_once __DIR__ . '/../dao/ProdutoDAO.php';

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

    public function acharPorId(int $id): array {
        return $this->produtoDAO->acharPorId($id);
    }

    public function acharPorSetor(string $setor): array {
        return $this->produtoDAO->acharPorSetor($setor);
    }
}