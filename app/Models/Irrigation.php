<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Irrigation extends Model
{
    use HasUuids;

    protected $fillable = ['applicationAmount', 'irrigationDate', 'pivot_id', 'user_id'];
}


