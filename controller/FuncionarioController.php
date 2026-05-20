<?php

namespace Controller;
use DAO\FuncionarioDAO;
use Model\Funcionario;

class FuncionarioController {
    private FuncionarioDAO $funcionarioDAO;

    public function __construct(){
        $this->funcionarioDAO = new FuncionarioDAO();
    }

    public function listar(): array {
        return $this->funcionarioDAO->listar();
    }

    public function criar(Funcionario $funcionario): void {
        $this->funcionarioDAO->criar($funcionario);
    }

    public function deletar(int $id): void {
        $this->funcionarioDAO->deletar($id);
    }
}
