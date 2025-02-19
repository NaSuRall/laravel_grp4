<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
        protected $table = 'schedules';
        protected $fillable = [
            'id',
            'user_id',
            'day_of_week',
            'start_time',
            'end_time',

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
