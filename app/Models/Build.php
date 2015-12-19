<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Build extends Model

{
	protected $guarded = ['token'];
	protected $table = 'buildings';
}
