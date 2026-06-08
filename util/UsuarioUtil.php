<?php

class UsuarioUtil {
    public static function getPrimeiroNome(string $nomeCompleto) {
        $nomeCompletoRepartido = explode(" ", $nomeCompleto);

        return $nomeCompletoRepartido[0];
    }
    public static function getSobrenome(string $nomeCompleto) {
        $nomeCompletoRepartido = explode(" ", $nomeCompleto);

        return implode(" ", array_slice($nomeCompletoRepartido, 1));;
    }
}

?>