<?php

namespace App\Exceptions;

use App\Models\Empresa;
use InvalidArgumentException;

class RoleAlreadyExists extends InvalidArgumentException
{
    public static function create(string $roleName, string $guardName, $empresa_id)
    {
        $empresa = Empresa::find($empresa_id);
        return new static("El rol `{$roleName}` ya existe para el guard `{$guardName}` en la empresa `{$empresa->razon_social}`.");
    }
}
