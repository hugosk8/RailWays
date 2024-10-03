<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'slot_date',
        'start_time',
        'end_time',
        'duration',
        'available',
    ];
    

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
