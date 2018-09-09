<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Records extends Authenticatable
{
    use Notifiable;

    protected $table  = 'records';

    protected $fillable = [
        'title',
        'pre_title',
        'description',
        'category',
        'show',
    ];

    protected $hidden = [
        'show',
    ];

}


?>
