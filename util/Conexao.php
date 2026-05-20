<?php

namespace Util;
class Conexao {

    private static ?PDO $conexao = null;

    public static function getConexao(): PDO {
        if (self::$conexao == null) {
            //Criar a conexao
            $opcoes = array(
                //Define o tipo do erro como exceção
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                //Define o tipo do retorno das consultas
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            );

            self::$conexao =
                new PDO(
                    DB_SGBD . ":host=" . DB_HOST . ";dbname=" . DB_NAME,
                    DB_USER,
                    DB_PASSWORD,
                    $opcoes
                );
        }

        return self::$conexao;
    }
}
