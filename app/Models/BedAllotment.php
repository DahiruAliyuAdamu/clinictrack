<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BedAllotment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'bed_number',
        'allotment_time',
        'discharge_time',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
