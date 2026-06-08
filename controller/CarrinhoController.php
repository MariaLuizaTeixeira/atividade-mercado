<?php

namespace Controller;
use DAO\CarrinhoDAO;
use Model\Carrinho;
use Model\Usuario;

require_once __DIR__ . '/../dao/CarrinhoDAO.php';

class CarrinhoController {
    private CarrinhoDAO $carrinhoDAO;

    public function __construct(){
        $this->carrinhoDAO = new CarrinhoDAO();
    }

    public function criar(int $usuarioId): void {
        $this->carrinhoDAO->criar($usuarioId);
    }

    public function acharPorId(int $id): array {
        return $this->carrinhoDAO->acharPorId($id);
    }

    public function acharPorUsuarioId(int $usuarioId): ?array {
        return $this->carrinhoDAO->acharPorUsuarioId($usuarioId);
    }
}