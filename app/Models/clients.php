<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    // Models Clients
    protected $table = 'clients';

    protected $fillable = [
        'name_clients',
        'phone_clients',
        'send_clients',
    ];
}
