<?php

namespace Model;
use Cassandra\Date;
use Enums\Setor;
use Enums\StatusEstoque;

class Produto {
    private int $id;
    private string $nome;
    private string $descricao;
    private Setor $setor;
    private float $preco;
    private Date $validade;
    private string $peso;
    private string $marca;
    private string $quantidadeEstoque;
    private StatusEstoque $status;
    private string $imagem;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getSetor(): Setor
    {
        return $this->setor;
    }

    public function setSetor(Setor $setor): self
    {
        $this->setor = $setor;

        return $this;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function setPreco(float $preco): self
    {
        $this->preco = $preco;

        return $this;
    }

    public function getImagem(): string
    {
        return $this->imagem;
    }

    public function setImagem(string $imagem): self
    {
        $this->imagem = $imagem;

        return $this;
    }

    public function getValidade(): Date
    {
        return $this->validade;
    }

    public function setValidade(Date $validade): void
    {
        $this->validade = $validade;
    }

    public function getPeso(): string
    {
        return $this->peso;
    }

    public function setPeso(string $peso): void
    {
        $this->peso = $peso;
    }

    public function getMarca(): string
    {
        return $this->marca;
    }

    public function setMarca(string $marca): void
    {
        $this->marca = $marca;
    }

    public function getStatus(): StatusEstoque
    {
        return $this->status;
    }

    public function setStatus(StatusEstoque $status): void
    {
        $this->status = $status;
    }

    public function getQuantidadeEstoque(): string
    {
        return $this->quantidadeEstoque;
    }

    public function setQuantidadeEstoque(string $quantidadeEstoque): void
    {
        $this->quantidadeEstoque = $quantidadeEstoque;
    }
}