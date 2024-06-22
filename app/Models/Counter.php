<?php

namespace App\Models;

class Counter
{
    protected $table = 'counters';
    protected $fillable = ['value'];

    public static function first()
    {
        return [
            'value' => 0,
        ];
    }
}
