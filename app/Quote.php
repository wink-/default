<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Quote
 *
 * @package App
 * @property string $customer
 * @property string $contact
 * @property string $partnumber
 * @property string $partdescription
 * @property string $process
 * @property string $specification
 * @property string $material
 * @property enum $method
 * @property integer $quantity_minimum
 * @property integer $quantity_maximum
 * @property decimal $price
 * @property enum $units
 * @property decimal $minimum_lot_charge
 * @property integer $quantity_price_break
 * @property decimal $price_break
 * @property string $thickness_minimum
 * @property string $thickness_maximum
 * @property string $weight
 * @property string $surface_area
 * @property string $baking_time_pre
 * @property string $baking_temp_pre
 * @property string $baking_time_post
 * @property string $baking_temp_post
 * @property string $bake_notes
 * @property tinyInteger $blasting
 * @property string $blast_notes
 * @property tinyInteger $masking
 * @property string $mask_notes
 * @property tinyInteger $testing
 * @property string $testing_notes
 * @property string $print
 * @property text $notes
 * @property text $comments
 * @property string $user
 * @property tinyInteger $archive
 * @property integer $revision
*/
class Quote extends Model
{
    use SoftDeletes;

    protected $table = 'sft_quotes';

    protected $fillable = ['partnumber', 'partdescription', 'specification', 'material', 'method', 'quantity_minimum', 'quantity_maximum', 'price', 'units', 'minimum_lot_charge', 'quantity_price_break', 'price_break', 'thickness_minimum', 'thickness_maximum', 'weight', 'surface_area', 'baking_time_pre', 'baking_temp_pre', 'baking_time_post', 'baking_temp_post', 'bake_notes', 'blasting', 'blast_notes', 'masking', 'mask_notes', 'testing', 'testing_note', 'print', 'notes', 'comments', 'archive', 'revision', 'customer_id', 'contact_id', 'process_id', 'user_id', 'value_min', 'value_max'];
    protected $hidden = [];
    public static $searchable = [
        'partnumber',
    ];
    
    public static function boot()
    {
        parent::boot();

        Quote::observe(new \App\Observers\UserActionsObserver);
    }

    public static $enum_method = ["Rack Plate" => "Rack Plate", "Barrel Plate" => "Barrel Plate", "Bulk Process" => "Bulk Process", "Hand Operation" => "Hand Operation", "Lab Operation" => "Lab Operation"];

    public static $enum_units = ["each" => "Each", "thousand" => "M", "pound" => "Pound", "ft" => "Foot", "lot" => "Lot", "in" => "Inch", "sets" => "Sets"];

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
    public function setContactIdAttribute($input)
    {
        $this->attributes['contact_id'] = $input ? $input : null;
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
    public function setQuantityMinimumAttribute($input)
    {
        $this->attributes['quantity_minimum'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setQuantityMaximumAttribute($input)
    {
        $this->attributes['quantity_maximum'] = $input ? $input : null;
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
    public function setQuantityPriceBreakAttribute($input)
    {
        $this->attributes['quantity_price_break'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPriceBreakAttribute($input)
    {
        $this->attributes['price_break'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
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
        return $this->belongsTo(Customer::class, 'customer_id')->withTrashed();
    }
    
    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id')->withTrashed();
    }
    
    public function process()
    {
        return $this->belongsTo(Process::class, 'process_id')->withTrashed();
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
