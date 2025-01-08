<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class message extends Model
{
    use HasFactory, Notifiable;
    // Models Messager
    protected $table = 'messages';

    protected $fillable = [
        'name_message',
        'phone_message',
    ];
}
