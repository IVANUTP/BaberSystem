<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class appointmentsModel extends Model
{
    protected $table = 'appointments';
    protected $fillable = [
        'user_id',
        'barber_id',
        'service_id',
        'date',
        'time',
        'status'

    ];

    protected $casts = [
        'date' => 'date',
        'time' => 'datetime:H:i:s',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function barber()
    {
        return $this->belongsTo(User::class, 'barber_id');
    }
    public function service()
    {
        return $this->belongsTo(servicesModel::class, 'service_id');
    }

}
