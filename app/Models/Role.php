<?php
namespace App\Models;

use App\Traits\AppendEmpresa;
use App\Traits\OnSaveEmpresa;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use AppendEmpresa, OnSaveEmpresa;
    protected $fillable = ['name', 'guard_name', 'empresa_id', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cliente()
    {
        return $this->belongsTo(Empresa::class);
    }
}
