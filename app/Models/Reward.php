<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    protected $fillable = ['name', 'color', 'probability'];
}
