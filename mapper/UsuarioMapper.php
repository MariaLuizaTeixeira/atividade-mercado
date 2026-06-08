<?php

namespace Mapper;
use Model\Usuario;
use UsuarioUtil;

require __DIR__ . "/../model/Usuario.php";
require __DIR__ . "/../util/UsuarioUtil.php";

class UsuarioMapper {
    public static function arrayParaUsuario(array $dados): Usuario {
        return new Usuario($dados['primeiro_nome'], $dados['sobrenome'], $dados['email'], $dados['senha_hash'], $dados['telefone'], $dados['endereco']);
    }

    public static function bancoParaUsuario(array $dados): Usuario {
        $usuario = new Usuario(
            UsuarioUtil::getPrimeiroNome($dados['nome_completo']),
            UsuarioUtil::getSobrenome($dados['nome_completo']),
            $dados['email'],
            $dados['senha_hash'],
            $dados['telefone'],
            $dados['endereco']
        );

        $usuario->setId($dados['id']);
        
        return $usuario;
    }
}