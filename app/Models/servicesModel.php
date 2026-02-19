<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class servicesModel extends Model
{

    protected $table='services_';

    protected $fillable = [
        'name',
        'price',
        'duration',
        'img',
        'description'

    ];

    public function appointments(){
        return $this->hasMany(appointmentsModel::class,'service_id');
    }
}
