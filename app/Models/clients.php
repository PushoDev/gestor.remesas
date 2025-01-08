<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    use HasFactory;
    // Models Clients
    protected $guarded = [];

    protected $fillable = [
        'name_clients',
        'phone_clients',
        'send_clients',
    ];
}
