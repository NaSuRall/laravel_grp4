<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
        protected $table = 'schedule';
        protected $fillable = [
            'user_id',
            'day_of_week',
            'start_time',
            'end_time',
        ];



    public function getTimeSlots(): array
    {
        if (!$this->start_time || !$this->end_time) {
            return [];
        }

        $start = strtotime($this->start_time);
        $end = strtotime($this->end_time);
        $slots = [];

        while ($start < $end) {
            $nextSlot = $start + 3600;
            if ($nextSlot <= $end) {
                $slots[] = date('H:i', $start) . ' - ' . date('H:i', $nextSlot);
            }
            $start = $nextSlot;
        }
        return $slots;
    }





    public function getFillable(): array
    {
        return $this->fillable;
    }

    public function setFillable(array $fillable): void
    {
        $this->fillable = $fillable;
    }

    public function getTable(): string
    {
        return $this->table;
    }

}
