<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class familiar extends Model
{
    // Models Families
    use HasFactory;

    protected $guarded = [];

    public function cliente()
    {
        return $this->belongsTo(clients::class, 'clients_id');
    }
}
