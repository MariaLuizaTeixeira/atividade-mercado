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

    public function criar(Usuario $usuario): void {
        $this->carrinhoDAO->criar($usuario);
    }

    public function acharPorId(int $id): array {
        return $this->carrinhoDAO->acharPorId($id);
    }
}