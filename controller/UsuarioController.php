<?php

namespace Controller;
use DAO\UsuarioDAO;
use mapper\UsuarioMapper;

include_once __DIR__ . "/../dao/UsuarioDAO.php";

class UsuarioController {
    private UsuarioDAO $usuarioDAO;
    private UsuarioMapper $usuarioMapper;

    public function __construct(){
        $this->usuarioDAO = new UsuarioDAO();
        $this->usuarioMapper = new UsuarioMapper();
    }

    public function listar(): array {
        return $this->usuarioDAO->listar();
    }

    public function criar(array $dados): void {
        $usuario = $this->usuarioMapper->arrayParaUsuario($dados);
        $this->usuarioDAO->criar($usuario);
    }

    public function deletar(int $id): void {
        $this->usuarioDAO->deletar($id);
    }

    public function verificarCredenciais(string $email, string $senha): bool {
        return $this->usuarioDAO->verificarCredenciais($email, $senha);
    }

    public function acharPorId(int $id): array {
        return $this->produtoDAO->acharPorId($id);
    }
}
