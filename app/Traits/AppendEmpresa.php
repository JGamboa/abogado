<?php
namespace App\Traits;

trait AppendEmpresa
{

    public static function bootAppendEmpresa()
    {

        static::addGlobalScope(new \App\Scopes\EmpresaScope);

    }

}