<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class clients extends Model
{
    use HasFactory, Notifiable;
    // Models Clients
    protected $guarded = [];

    protected $fillable = [
        'name_clients',
        'phone_clients',
        'send_clients',
    ];

    public function familiares(): HasMany
    {
        return $this->hasMany(familiar::class, 'clients_id');
    }
}
