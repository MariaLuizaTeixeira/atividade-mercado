<?php

namespace Model;

class Carrinho {
    private int $id;
    private Usuario $usuario;
    private array $produtos = [];

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUsuario(): Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(Usuario $usuario): void
    {
        $this->usuario = $usuario;
    }

    public function getProdutos(): array
    {
        return $this->produtos;
    }

    public function setProdutos(array $produtos): void
    {
        $this->produtos = $produtos;
    }
}