<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $table = 'appointments';
    protected $fillable = [
        'id',
        'patient_id',
        'date',
        'hour',
        'consultation_type',
        'description'
    ];

    public function getTable(): string
    {
        return $this->table;
    }

    public function getFillable(): array
    {
        return $this->fillable;
    }

    public function setFillable(array $fillable): void
    {
        $this->fillable = $fillable;
    }


}
