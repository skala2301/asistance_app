<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RolePermission extends Pivot
{
    use HasUuids;
    protected $keyType = 'string';
    protected $table = 'role_permissions';
    public $incrementing = false;
    public $timestamps = true;
}
