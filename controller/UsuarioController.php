<?php

namespace Controller;
use DAO\UsuarioDAO;
use Model\Usuario;

class UsuarioController {
    private UsuarioDAO $usuarioDAO;

    public function __construct(){
        $this->usuarioDAO = new UsuarioDAO();
    }

    public function listar(): array {
        return $this->usuarioDAO->listar();
    }

    public function criar(Usuario $usuario): void {
        $this->usuarioDAO->criar($usuario);
    }

    public function deletar(int $id): void {
        $this->usuarioDAO->deletar($id);
    }
}