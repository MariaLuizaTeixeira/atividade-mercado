<?php

namespace Model;

abstract class Usuario {
    protected int $id;
    protected string $nomeCompleto;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getNomeCompleto(): string
    {
        return $this->nomeCompleto;
    }

    public function setNomeCompleto(string $nomeCompleto): self
    {
        $this->nomeCompleto = $nomeCompleto;

        return $this;
    }
}