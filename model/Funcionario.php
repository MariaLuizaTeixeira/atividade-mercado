<?php

namespace Model;

use Enums\Cargo;
use Model\Usuario;

class Funcionario extends Usuario {
    private Cargo $cargo;

    public function getCargo(): Cargo
    {
        return $this->cargo;
    }

    public function setCargo(Cargo $cargo): self
    {
        $this->cargo = $cargo;

        return $this;
    }
}