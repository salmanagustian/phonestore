<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gift extends Model
{
    use SoftDeletes;

    protected $table      = 'gifts';
    protected $guarded    = [];
    public    $timestamps = true;

   
}
