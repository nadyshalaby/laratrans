<?php

namespace App;

use CoreCave\Laratrans\Translation\MasterTranslatable;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use MasterTranslatable;
}
