<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Infrastructure extends Model
{
    protected $guarded  = ['token'];
	protected $table    = 'type_infrastructures';
  	protected $fillable = ['type'];
}
