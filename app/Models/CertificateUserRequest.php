<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CertificateUserRequest extends Model
{
    public const STATUS_SELECT = [
        'requested' => 'Requested',
        'accepted' => 'Accepted',
        'rejected' => 'Rejected',
        'deleted' => 'Deleted'
    ];

    use HasFactory, SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'certificate_user_requests';

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
    protected $fillable = ['requirements', 'user_id', 'certificate_user_id', 'requested_by', 'status'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Get the user that owns the CertificateUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the certificate that owns the CertificateUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function certificateUser(): BelongsTo
    {
        return $this->belongsTo(CertificateUser::class);
    }

    /**
     * Get all of the attachments for the CertificateUserRequest
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attachments(): HasMany
    {
        return $this->hasMany(Attachment::class, 'certificate_user_request_id');
    }


    /**
     * Holds the methods' names of Eloquent Relations
     * to fall on delete cascade or on restoring
     *
     * @var array
     */
    protected static $relations_to_cascade = [
        'attachments',
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
