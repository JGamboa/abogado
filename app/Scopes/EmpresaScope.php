<?php
namespace App\Scopes;

// Scope
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class EmpresaScope implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        $builder->where($model->getTable() . '.empresa_id', '=', session('empresa_id'));
    }

}