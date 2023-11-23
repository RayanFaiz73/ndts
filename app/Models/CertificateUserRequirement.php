<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CertificateUserRequirement extends Model
{
    public const STATUS_SELECT = [
        'pending' => 'Pending',
        'uploaded' => 'Uploaded',
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
    protected $table = 'certificate_user_requirements';

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
    protected $fillable = ['file', 'checkbox', 'certificate_requirement_id', 'user_id', 'client_id', 'status', 'note'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Get the user that owns the certificateUserRequirement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the client that owns the certificateUserRequirement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class,'client_id');
    }

    /**
     * Get the certificate that owns the certificateRequirement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function certificateRequirement(): BelongsTo
    {
        return $this->belongsTo(certificateRequirement::class);
    }

}
