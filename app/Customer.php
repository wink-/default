<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Customer
 *
 * @package App
 * @property string $code
 * @property string $name
 * @property string $physical_address
 * @property string $address_extension
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $company_phone
 * @property string $fax
 * @property string $email
 * @property string $contact1
 * @property string $extension1
 * @property string $contact2
 * @property string $phone2
 * @property string $extension2
 * @property text $note
 * @property string $billing_address
 * @property string $billing_city
 * @property string $billing_state
 * @property string $billing_zip
 * @property string $billing_phone
 * @property string $billing_fax
 * @property string $billing_email
 * @property string $ship_to_address
 * @property string $ship_to_city
 * @property string $ship_to_state
 * @property string $ship_to_zip
 * @property string $ship_to_phone
 * @property string $ship_to_fax
 * @property string $ship_to_email
 * @property string $tax_id
 * @property tinyInteger $cod
 * @property tinyInteger $archive
 * @property integer $revision
 * @property string $ship_to_address_code
 * @property string $destination_code
 * @property string $carrier_code
*/
class Customer extends Model
{
    use SoftDeletes;
    protected $table = 'sft_customers';
    protected $fillable = ['code', 'name', 'physical_address', 'address_extension', 'city', 'state', 'zip', 'company_phone', 'fax', 'email', 'contact1', 'extension1', 'contact2', 'phone2', 'extension2', 'note', 'billing_address', 'billing_city', 'billing_state', 'billing_zip', 'billing_phone', 'billing_fax', 'billing_email', 'ship_to_address', 'ship_to_city', 'ship_to_state', 'ship_to_zip', 'ship_to_phone', 'ship_to_fax', 'ship_to_email', 'tax_id', 'cod', 'archive', 'revision', 'ship_to_address_code', 'destination_code', 'carrier_code'];
    protected $hidden = [];
    public static $searchable = [
        'code',
        'name',
    ];
    
    public static function boot()
    {
        parent::boot();

        Customer::observe(new \App\Observers\UserActionsObserver);
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
