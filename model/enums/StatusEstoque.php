<?php

namespace Enums;

enum StatusEstoque: string {
    case Disponivel = 'Disponível';
    case PoucasUnidades = 'Poucas unidades';
    case Esgotado = 'Esgotado';
}
