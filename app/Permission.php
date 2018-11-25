<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission.
 *
 * @property string $title
 */
class Permission extends Model
{
    protected $fillable = ['title'];
    protected $hidden = [];

    public static function boot()
    {
        parent::boot();

        self::observe(new \App\Observers\UserActionsObserver());
    }
}
