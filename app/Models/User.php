<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasPermissionsTrait;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasPermissionsTrait;


    public const STATUS_SELECT = [
        'pending' => 'Pending',
        'approved' => 'Approved',
        'suspended' => 'Suspended',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
       'data_name',
        'name',
        'email',
        'password',
        'avatar',
        'role_id',
        'parent_id',
        'country_id',
        'state_id',
        'city_id',
        'zip_code',
        'address_one',
        'address_two',
        'type',
        'phone',
        'created_by',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get all of the hospitals for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hospitals(): HasMany
    {
        return $this->hasMany(User::class, 'state_id', 'state_id')->where('role_id',3);
    }
    /**
     * Get the parent that owns the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent(): BelongsTo
    {
    return $this->belongsTo(User::class, 'parent_id');
    }


    /**
     * Get all of the comments for the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class,'parent_id');
    }


    /**
     * Get all of the comments for the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childrenUsers(): HasMany
    {
        return $this->hasMany(User::class,'parent_id')->with('users');
    }


    /**
     * Get the user that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by');
    }


    /**
     * Get the user that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }


    /**
     * Send the password reset notification.
     *
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }


    /**
     * Send the email verification notification.
     *
     * @return void
     */
    // public function sendEmailVerificationNotification()
    // {
    //     $this->notify(new VerifyEmail);
    // }

    /**
    * Gets the permissions of a specific menu
    */
    public function hasPermissions(int $menu_id){
        // dd($menu_id,$this->role,$this->role->permissions);
        foreach($this->role->permissions as $perm){
            if($menu_id == $perm->menu_id){
                return $perm;
            }
        }
        return false;
    }



    /**
     * Holds the methods' names of Eloquent Relations
     * to fall on delete cascade or on restoring
     *
     * @var array
     */
    protected static $relations_to_cascade = [];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function($resource) {
            foreach (static::$relations_to_cascade as $relation) {
                // foreach ($resource->{$relation}()->get() as $item) {
                //     $item->delete();
                // }
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
            // $resource->permissions()->detach();
            // $resource->roles()->detach();
        });
        static::deleted(function($resource)
        {
            foreach ($resource->parent()->get() as $item) {
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

    public function country() {
         return $this->belongsTo(Country::class, 'country_id', 'id');
     }
   public function state() {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
   public function city() {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
   public function patient() {
        return $this->belongsTo(Patient::class, 'id', 'staff_id');
    }


}
