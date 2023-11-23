<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CertificateUser extends Model
{
    public const STATUS_SELECT = [
        'requested' => 'Requested',
        'accepted' => 'Accepted',
        'rejected' => 'Rejected'
    ];
    public const REVERIFY_SELECT = [
        '1' => 'Monthly',
        '2' => 'Bi-Monthly',
        '3' => 'Quarterly',
        '6' => 'Half yearly',
        '12' => 'Yearly'
    ];

    use HasFactory, SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'certificate_users';

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
    protected $fillable = ['user_id', 'certificate_id', 'status'];

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
    public function certificate(): BelongsTo
    {
        return $this->belongsTo(Certificate::class);
    }
}
