<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlanet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'planet_id',
    ];

    public function planets()
    {
        return $this->belongsTo(Planet::class, 'planet_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
