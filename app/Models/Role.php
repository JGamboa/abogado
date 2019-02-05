<?php
namespace App\Models;

use App\Traits\AppendEmpresa;
use Spatie\Permission\Models\Role as SpatieRole;
use App\Exceptions\RoleAlreadyExists;
use Spatie\Permission\Guard;

class Role extends SpatieRole
{
    use AppendEmpresa;
    protected $fillable = ['name', 'guard_name', 'empresa_id', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public static function create(array $attributes = [])
    {
        $attributes['guard_name'] = $attributes['guard_name'] ?? Guard::getDefaultName(static::class);

        if (static::where('name', $attributes['name'])->where('guard_name', $attributes['guard_name'])->where('empresa_id', $attributes['empresa_id'])->first()) {
            throw RoleAlreadyExists::create($attributes['name'], $attributes['guard_name'], $attributes['empresa_id']);
        }

        if (isNotLumen() && app()::VERSION < '5.4') {
            return parent::create($attributes);
        }

        return static::query()->create($attributes);
    }

    /**
     * A role may belong to various tenants.
     */
    public function tenants(): BelongsToMany
    {
        return $this->belongsToMany(
            config('permission.models.tenant'),
            config('permission.table_names.role_tenant_user')
        );
    }
}
