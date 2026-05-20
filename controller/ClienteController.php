<?php

namespace Controller;
use DAO\ClienteDAO;
use Model\Cliente;

class ClienteController {
    private ClienteDAO $clienteDAO;

    public function __construct(){
        $this->clienteDAO = new ClienteDAO();
    }

    public function listar(): array {
        return $this->clienteDAO->listar();
    }

    public function criar(Cliente $cliente): void {
        $this->clienteDAO->criar($cliente);
    }

    public function deletar(int $id): void {
        $this->clienteDAO->deletar($id);
    }
}