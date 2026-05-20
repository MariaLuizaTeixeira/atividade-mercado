<?php

namespace Model;

use Model\Usuario;

class Cliente extends Usuario {
    private string $endereco;

    public function getEndereco(): string
    {
        return $this->endereco;
    }

    public function setEndereco(string $endereco): self
    {
        $this->endereco = $endereco;

        return $this;
    }
}