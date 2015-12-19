<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    protected $guarded = ['token'];
	protected $table = 'counters';
}
