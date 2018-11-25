<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CorrectiveAction.
 *
 * @property string $discrepant_material
 * @property text $description_of_non_conformance
 * @property text $containment
 * @property text $interim_action
 * @property text $preventative_action
 * @property text $root_cause
 * @property text $verification
 * @property tinyInteger $complete
 * @property string $completed_at
 * @property string $supporting_document
 */
class CorrectiveAction extends Model
{
    use SoftDeletes;
    protected $table = 'pluto_corrective_actions';
    protected $fillable = ['description_of_non_conformance', 'containment', 'interim_action', 'preventative_action', 'root_cause', 'verification', 'complete', 'completed_at', 'supporting_document', 'discrepant_material_id'];
    protected $hidden = [];
    public static $searchable = [
    ];

    public static function boot()
    {
        parent::boot();

        self::observe(new \App\Observers\UserActionsObserver());
    }

    /**
     * Set to null if empty.
     *
     * @param $input
     */
    public function setDiscrepantMaterialIdAttribute($input)
    {
        $this->attributes['discrepant_material_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format.
     *
     * @param $input
     */
    public function setCompletedAtAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['completed_at'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['completed_at'] = null;
        }
    }

    /**
     * Get attribute from date format.
     *
     * @param $input
     *
     * @return string
     */
    public function getCompletedAtAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    public function discrepant_material()
    {
        return $this->belongsTo(\App\DiscrepantMaterial::class, 'discrepant_material_id', 'id');
    }
}
