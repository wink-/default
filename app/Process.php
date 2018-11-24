<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Process
 *
 * @package App
 * @property string $code
 * @property string $name
 * @property decimal $minimum_lot_charge
 * @property tinyInteger $compliant_rohs
 * @property tinyInteger $compliant_reach
 * @property tinyInteger $archive
 * @property integer $revision
*/
class Process extends Model
{
    use SoftDeletes;


    protected $table = 'sft_processes';
    protected $fillable = ['code', 'name', 'minimum_lot_charge', 'compliant_rohs', 'compliant_reach', 'archive', 'revision'];
    protected $hidden = [];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        Process::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setMinimumLotChargeAttribute($input)
    {
        $this->attributes['minimum_lot_charge'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setRevisionAttribute($input)
    {
        $this->attributes['revision'] = $input ? $input : null;
    }
}
