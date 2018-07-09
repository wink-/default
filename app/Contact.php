<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contact
 *
 * @package App
 * @property string $customer
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $extension
 * @property string $email
 * @property tinyInteger $archive
*/
class Contact extends Model
{
    use SoftDeletes;
    protected $table = 'sft_contacts';
    protected $fillable = ['first_name', 'last_name', 'phone', 'extension', 'email', 'archive', 'customer_id'];
    protected $hidden = [];
    public static $searchable = [
        'last_name',
    ];
    
    public static function boot()
    {
        parent::boot();

        Contact::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCustomerIdAttribute($input)
    {
        $this->attributes['customer_id'] = $input ? $input : null;
    }
    
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id')->withTrashed();
    }
    
}
