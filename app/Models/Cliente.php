<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Cliente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'clientes';
    protected $primaryKey = 'rut';
    protected $keyType = 'string';
    public $timestamps = false;
    public $incrementing = false;

    public function arriendo():HasMany
    {
        return $this->hasMany(Arriendo::class);
    }

}
