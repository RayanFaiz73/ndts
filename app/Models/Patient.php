<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'hospital_id',
        'staff_id',
        'diagnoses_id',
        'name',
        'nic',
        'age',
        'dob',
        'sex',
        'address',
        'pdf',

    ];

    // public function user() {
    //     return $this->hasMany(User::class, 'id', 'staff_id');
    // }

    /**
     * Get the staff that owns the Patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }

    /**
    * Get the hospital that owns the Patient
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function hospital()
    {
    return $this->belongsTo(User::class, 'hospital_id');
    }

    /**
    * Get the diagnose that owns the Patient
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function diagnose()
    {
    return $this->belongsTo(Diagnoses::class, 'diagnoses_id');
    }

    // public function parent()
    // {
    // return $this->belongsTo(Patient::class, 'parent_id');
    // }

    /**
     * Get the user that owns the Patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'foreign_key', 'other_key');
    }
}
