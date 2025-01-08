<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class familiar extends Model
{
    // Models Families
    use HasFactory, Notifiable;

    protected $guarded = [];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(clients::class, 'clients_id');
    }
}
