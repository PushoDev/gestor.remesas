<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    // Models Messager
    protected $table = 'messages';

    protected $fillable = [
        'name_message',
        'phone_message',
    ];
}
