<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
        protected $table = 'schedules';
        protected $fillable = [
            'id',
            'day_of_week',
            'date_time',
            'user_id'
        ];

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
