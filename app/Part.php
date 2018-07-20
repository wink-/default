<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Part
 *
 * @package App
 * @property string $number
 * @property string $description
 * @property string $customer
 * @property string $process
 * @property string $method_code
 * @property decimal $price
 * @property string $price_code
 * @property tinyInteger $certify
 * @property string $specification
 * @property tinyInteger $bake
 * @property string $procedure_code
 * @property string $material
 * @property string $material_name
 * @property string $material_condition
 * @property string $thickness_minimum
 * @property string $thickness_maximum
 * @property string $thickness_unit_code
 * @property string $surface_area
 * @property string $surface_area_unit_code
 * @property string $weight
 * @property string $weight_unit_code
 * @property string $length
 * @property string $width
 * @property string $height
 * @property string $dimension_unit_code
 * @property string $material_thickness
 * @property string $material_thickness_unit_code
 * @property text $special_requirement
 * @property text $note
 * @property integer $quality_check_1
 * @property integer $quality_check_2
 * @property integer $quality_check_3
 * @property integer $quality_check_4
 * @property integer $quality_check_5
 * @property integer $quality_check_6
 * @property tinyInteger $archive
 * @property integer $revision
*/
class Part extends Model
{
    protected $fillable = ['number', 'description', 'method_code', 'price', 'price_code', 'certify', 'specification', 'bake', 'procedure_code', 'material', 'material_name', 'material_condition', 'thickness_minimum', 'thickness_maximum', 'thickness_unit_code', 'surface_area', 'surface_area_unit_code', 'weight', 'weight_unit_code', 'length', 'width', 'height', 'dimension_unit_code', 'material_thickness', 'material_thickness_unit_code', 'special_requirement', 'note', 'quality_check_1', 'quality_check_2', 'quality_check_3', 'quality_check_4', 'quality_check_5', 'quality_check_6', 'archive', 'revision', 'customer_code', 'process_code'];
    protected $hidden = [];
    protected $table = 'sft_parts';

    public static $searchable = ['number'];
    
    public static function boot()
    {
        parent::boot();

        Part::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCustomerIdAttribute($input)
    {
        $this->attributes['customer_code'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setProcessIdAttribute($input)
    {
        $this->attributes['process_code'] = $input ? $input : null;
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
    public function setQualityCheck1Attribute($input)
    {
        $this->attributes['quality_check_1'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setQualityCheck2Attribute($input)
    {
        $this->attributes['quality_check_2'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setQualityCheck3Attribute($input)
    {
        $this->attributes['quality_check_3'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setQualityCheck4Attribute($input)
    {
        $this->attributes['quality_check_4'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setQualityCheck5Attribute($input)
    {
        $this->attributes['quality_check_5'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setQualityCheck6Attribute($input)
    {
        $this->attributes['quality_check_6'] = $input ? $input : null;
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
    
    public function process()
    {
        return $this->belongsTo(Process::class, 'process_code', 'code')->withTrashed();
    }
    
}
