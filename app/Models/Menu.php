<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    public const STATUS_SELECT = [
        'active' => 'Active',
        'inactive' => 'Inactive',
    ];

    use HasFactory, SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'menus';

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
    protected $fillable = ['name', 'slug', 'icon', 'route_name', 'menu_id', 'status'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Get all of the comments for the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class)->where('status','active');
    }

    /**
     * Get all of the comments for the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childrenMenus(): HasMany
    {
        return $this->hasMany(Menu::class)->with('menus')->where('status','active');
    }

    /**
     * Get the parent that owns the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }


    /**
     * Holds the methods' names of Eloquent Relations
     * to fall on delete cascade or on restoring
     *
     * @var array
     */
    protected static $relations_to_cascade = [
        'menus',
        'childrenMenus'
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
