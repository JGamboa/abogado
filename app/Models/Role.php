<?php
namespace App\Models;

use App\Traits\AppendEmpresa;
use Backpack\PermissionManager\app\Models\Role as BackpackRole;

class Role extends BackpackRole
{

    use AppendEmpresa;
    protected $fillable = ['name', 'empresa_id', 'updated_at', 'created_at'];
}
