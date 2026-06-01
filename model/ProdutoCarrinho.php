<?php

namespace Model;

class ProdutoCarrinho {
    private int $id;
    private Carrinho $carrinho;
    private Produto $produto;
    private int $quantidade;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCarrinho(): Carrinho
    {
        return $this->carrinho;
    }

    public function setCarrinho(Carrinho $carrinho): void
    {
        $this->carrinho = $carrinho;
    }

    public function getProduto(): Produto
    {
        return $this->produto;
    }

    public function setProduto(Produto $produto): void
    {
        $this->produto = $produto;
    }

    public function getQuantidade(): int
    {
        return $this->quantidade;
    }

    public function setQuantidade(int $quantidade): void
    {
        $this->quantidade = $quantidade;
    }
}