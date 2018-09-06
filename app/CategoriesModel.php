<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CategoriesModel extends Authenticatable
{
    use Notifiable;

    protected $table  = 'categories';

    protected $fillable = [
        'name',
    ];

}


?>
