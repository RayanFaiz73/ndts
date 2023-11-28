<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnoses extends Model
{
    use HasFactory;
    protected $fillable = [
        'diagnose',
    ];

    /**
     * Get the patient that owns the Diagnoses
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function patient()
    // {
    //     return $this->hasMany(Patient::class, 'diagnoses_id');
    // }


    /**
     * Get all of the Patient for the Diagnoses
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function patients()
    {
       return $this->hasMany(Patient::class, 'diagnoses_id');
    }

    // public function hospitals(): HasMany
    // {
    // return $this->hasMany(User::class, 'state_id', 'state_id')->where('role_id',3);
    // }

    /**
     * Get all of the comments for the Diagnoses
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function patients(): HasMany
    // {
    //     return $this->hasMany(Patient::class);
    // }
}
