<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attachment extends Model
{
    public const STATUS_SELECT = [
        'uploaded' => 'Uploaded',
        'accepted' => 'Accepted',
        'rejected' => 'Rejected',
        'canceled' => 'Canceled',
    ];

    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'attachments';

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
    protected $fillable = ['name', 'file', 'certificate_user_request_id', 'status'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Get the CertificateUserRequest that owns this Attachments
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function certificateUserRequest(): BelongsTo
    {
        return $this->belongsTo(CertificateUserRequest::class,'certificate_user_request_id');
    }
}
