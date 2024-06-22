<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'card';
    protected $primaryKey = 'id';
    protected $fillable = ['id','name', 'theme', 'type', 'url', 'date', 'iteration'];
    public $timestamps = false;


}
