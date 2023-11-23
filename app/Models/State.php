<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;


   public function users() {
        return $this->hasMany(User::class, 'state_id', 'id');
    }

    /**
     * Get all of the comments for the State
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }
    public function country()
    {
        return $this->hasMany(Country::class);
    }
}
