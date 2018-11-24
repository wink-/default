<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Class Workorder
 *
 * @package App
 * @property integer $number
 * @property string $customer
 * @property string $part
 * @property string $part_number
 * @property string $process
 * @property decimal $price
 * @property string $price_code
 * @property string $date_received
 * @property string $date_required
 * @property string $customer_purchase_order
 * @property string $customer_packing_list
 * @property double $quantity
 * @property string $unit_code
 * @property integer $quantity_shipped
 * @property integer $our_last_packing_list
 * @property string $destination_code
 * @property string $carrier_code
 * @property string $freight_code
 * @property string $date_shipped
 * @property integer $invoice_number
 * @property string $invoice_date
 * @property decimal $invoice_amount
 * @property integer $priority
 * @property tinyInteger $rework
 * @property tinyInteger $hot
 * @property tinyInteger $started
 * @property tinyInteger $completed
 * @property tinyInteger $shipped
 * @property tinyInteger $cod
 * @property tinyInteger $invoiced
 * @property text $note
 * @property string $session_id
 * @property tinyInteger $archive
 * @property integer $revision
*/
class Workorder extends Model
{
    protected $dates = ['date_required', 'invoice_date', 'created_at', 'updated_at'];

    protected $fillable = ['number', 'part_number', 'price', 'price_code', 'date_received', 'date_required', 'customer_purchase_order', 'customer_packing_list', 'quantity', 'unit_code', 'quantity_shipped', 'our_last_packing_list', 'destination_code', 'carrier_code', 'freight_code', 'date_shipped', 'invoice_number', 'invoice_date', 'invoice_amount', 'priority', 'rework', 'hot', 'started', 'completed', 'shipped', 'cod', 'invoiced', 'note', 'session_id', 'archive', 'revision', 'customer_code', 'part_id', 'process_code'];
    protected $hidden = [];
    protected $table = 'sft_work_orders';

    public static $searchable = [
        'number',
    ];
    
    public static function boot()
    {
        parent::boot();

        Workorder::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setNumberAttribute($input)
    {
        $this->attributes['number'] = $input ? $input : null;
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
    public function setPartIdAttribute($input)
    {
        $this->attributes['part_id'] = $input ? $input : null;
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
    public function setPriceAttribute($input)
    {
        $this->attributes['price'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDateReceivedAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['date_received'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['date_received'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDateReceivedAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }
    
    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDateRequiredAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['date_required'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['date_required'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDateRequiredAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }
    
    /**
     * Set attribute to date format
     * @param $input
     */
    public function setQuantityAttribute($input)
    {
        if ($input != '') {
            $this->attributes['quantity'] = $input;
        } else {
            $this->attributes['quantity'] = null;
        }
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setQuantityShippedAttribute($input)
    {
        $this->attributes['quantity_shipped'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setOurLastPackingListAttribute($input)
    {
        $this->attributes['our_last_packing_list'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDateShippedAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['date_shipped'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['date_shipped'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDateShippedAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setInvoiceNumberAttribute($input)
    {
        $this->attributes['invoice_number'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setInvoiceDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['invoice_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['invoice_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getInvoiceDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setInvoiceAmountAttribute($input)
    {
        $this->attributes['invoice_amount'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPriorityAttribute($input)
    {
        $this->attributes['priority'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setRevisionAttribute($input)
    {
        $this->attributes['revision'] = $input ? $input : null;
    }
    
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_code', 'code')->withTrashed();
    }
    
    public function part()
    {
        return $this->belongsTo(Part::class, 'part_id');
    }
    
    public function process()
    {
        return $this->belongsTo(Process::class, 'process_code', 'code')->withTrashed();
    }
}
