<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

/**
 * Class DiscrepantMaterial
 *
 * @package App
 * @property string $workorder
 * @property string $part
 * @property string $part_number
 * @property string $customer
 * @property string $customer_code
 * @property string $process
 * @property string $process_code
 * @property integer $quantity_rejected
 * @property text $reason_for_rejection
 * @property string $rejection_date
 * @property enum $rejection_type
 * @property string $corrective_action_due_date
 * @property string $form
*/
class DiscrepantMaterial extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;
    protected $table = 'pluto_discrepant_materials';
    protected $fillable = ['part_number', 'customer_code', 'process_code', 'quantity_rejected', 'reason_for_rejection', 'rejection_date', 'rejection_type', 'corrective_action_due_date', 'form', 'workorder_id', 'part_id', 'customer_id', 'process_id', 'workorder'];
    //protected $dates = ['created_at', 'updated_at', 'deleted_at', 'corrective_action_due_date', 'rejection_date'];
    protected $hidden = [];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        DiscrepantMaterial::observe(new \App\Observers\UserActionsObserver);
    }

    public static $enum_rejection_type = ["external" => "External", "internal" => "Internal"];

    /**
     * Set to null if empty
     * @param $input
     */
    public function setWorkorderIdAttribute($input)
    {
        $this->attributes['workorder_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setPartIdAttribute($input)
    {
        $this->attributes['part_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCustomerIdAttribute($input)
    {
        $this->attributes['customer_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setProcessIdAttribute($input)
    {
        $this->attributes['process_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setQuantityRejectedAttribute($input)
    {
        $this->attributes['quantity_rejected'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setRejectionDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['rejection_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['rejection_date'] = null;
        }
    }


    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getRejectionDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setCorrectiveActionDueDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['corrective_action_due_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['corrective_action_due_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getCorrectiveActionDueDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    
    public function workorder()
    {
        return $this->belongsTo(Workorder::class, 'workorder', 'number');
    }
    
    public function part()
    {
        return $this->belongsTo(Part::class, 'part_id');
    }
    
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_code', 'code')->withTrashed();
    }
    
    public function process()
    {
        return $this->belongsTo(Process::class, 'process_code', 'code')->withTrashed();
    }
    
}
