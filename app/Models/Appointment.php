<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $table = 'appointment';
    protected $fillable = [
        'user_id',
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function appointment()
    {
        $schedules = Schedule::all();
        return view('appointment', compact('schedules'));
    }

}
