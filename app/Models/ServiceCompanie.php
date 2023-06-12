<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceCompanie extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'service_companies';
    protected $guarded = ['created_at','updated_at','deleted_at'];

    public function services()
    {
        $this->hasMany(Service::class);
    }
}
