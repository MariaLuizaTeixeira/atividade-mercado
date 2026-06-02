<?php

namespace Mapper;
use Model\Usuario;

require __DIR__ . "/../model/Usuario.php";

class UsuarioMapper {
    public function arrayParaUsuario(array $dados): Usuario {
        return new Usuario($dados['primeiroNome'], $dados['sobrenome'], $dados['email'], $dados['senha'], $dados['telefone'], $dados['endereco']);
    }

    public function bancoParaUsuario(array $dados): Usuario {
        $partes = explode(" ", $dados['nome_completo']);
        $primeiroNome = $partes[0];
        $sobrenome = implode(" ", array_slice($partes, 1));

        return new Usuario(
            $primeiroNome,
            $sobrenome,
            $dados['email'],
            $dados['senha_hash'],
            $dados['telefone'],
            $dados['endereco']
        );
    }
}