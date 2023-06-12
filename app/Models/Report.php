<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'report';
    protected $guarded = ['id','create_at','update_at'];


    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function service()
    {
        return $this->hasMany(Service::class);
    }

    public function serviceCompenie()
    {
        return $this->hasMany(ServiceCompanie::class);
    }

    public function incidents()
    {
        return $this->hasOne(Incident::class);
    }
}
