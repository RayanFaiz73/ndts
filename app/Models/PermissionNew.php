<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermissionNew extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permission_news';

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
    protected $fillable = ['name', 'slug'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;


     /**
      * The roles that belong to the PermissionNew
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
      */
     public function roles(): BelongsToMany
     {
        return $this->belongsToMany(RoleNew::class,'roles_permissions');
     }

     /**
      * The users that belong to the PermissionNew
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
      */
     public function users(): BelongsToMany
     {
        return $this->belongsToMany(User::class,'users_permissions');
     }



    /**
     * Holds the methods' names of Eloquent Relations
     * to fall on delete cascade or on restoring
     *
     * @var array
     */
    protected static $relations_to_cascade = [
        'roles',
        'users'
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
