<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incident extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'incident';

    /**
     * $guarded especifica los atributos que no deben ser asignados en masa
     * $guarded en el modelo evita que ciertos atributos sean asignados masivamente, 
     * protegiendo campos como id y marcas de tiempo para evitar modificaciones no 
     * deseadas por parte de los usuarios.
     */
    protected $guarded = ['id','created_at','updated_at','date','hour','deleted_at'];

    public function user(){
        // belongsTo($related, $foreignKey = null, $ownerKey = null)
        return $this->belongsTo(User::class,'id_user','id');
    }

    public function service(){
        # Defina una relación inversa de uno a uno o de muchos.
        return $this->belongsTo(Service::class, 'id_service','id');
    }
}
