<?php

namespace CoreCave\Laratrans\Models;

use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    public $fillable = ['name', 'code', 'is_ltr', 'is_default'];
}
