<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class CertificateRequirement extends Model
{
    public const TYPE_SELECT = [
        'file' => 'Upload',
        'checkbox' => 'Check',
        'both' => "Both"
    ];

    use HasFactory, SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'certificate_requirements';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'type', 'certificate_id'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Get the type that owns the Certificate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function certificate(): BelongsTo
    {
        return $this->belongsTo(Certificate::class);
    }

    /**
     * Get all of the requirements for the CertificateRequirement
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userRequirements(): HasMany
    {
        return $this->hasMany(CertificateUserRequirement::class);
    }


    /**
     * Holds the methods' names of Eloquent Relations
     * to fall on delete cascade or on restoring
     *
     * @var array
     */
    protected static $relations_to_cascade = [
        'userRequirements',
    ];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function($resource) {
            foreach (static::$relations_to_cascade as $relation) {
                foreach ($resource->{$relation}()->get() as $item) {
                    $item->delete();
                }
            }
        });
        // cause a delete of a user to cascade to children so they are also deleted
        static::deleted(function($resource)
        {
            // $resource->parent_id = null;
            foreach ($resource->users()->get() as $item) {
                $item->parent_id = null;
                $item->update();
            }
            foreach ($resource->childrenUsers()->get() as $item) {
                $item->parent_id = null;
                $item->update();
            }
        });
        static::restoring(function($resource) {
            foreach (static::$relations_to_cascade as $relation) {
                foreach ($resource->{$relation}()->withTrashed()->get() as $item) {
                    $item->restore();
                }
            }
        });
    }
}
