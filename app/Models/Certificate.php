<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certificate extends Model
{
    public const STATUS_SELECT = [
        'active' => 'Active',
        'inactive' => 'Inactive',
    ];

    public const REVERIFY_SELECT = [
        '1' => 'Monthly',
        '2' => 'Bi-Monthly',
        '3' => 'Quaterly',
        '6' => 'Half Yearly',
        '12'=> 'Yearly'
    ];

    use HasFactory, SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'certificates';

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
    protected $fillable = ['name', 'certificate_type_id', 'status', 'reverify'];

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
    public function certificateType(): BelongsTo
    {
        return $this->belongsTo(CertificateType::class);
    }
    /**
     * Get all of the requirements for the Certificate
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requirements(): HasMany
    {
        return $this->hasMany(CertificateRequirement::class);
    }

    /**
     * Get all of the users for the Certificate
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function certificateUsers(): HasMany
    {
        return $this->hasMany(CertificateUser::class, 'certificate_id');
    }

    /**
     * Holds the methods' names of Eloquent Relations
     * to fall on delete cascade or on restoring
     *
     * @var array
     */
    protected static $relations_to_cascade = [
        'requirements',
        'certificateUsers'
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
