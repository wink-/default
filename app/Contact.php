<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contact.
 *
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

        self::observe(new \App\Observers\UserActionsObserver());
    }

    /**
     * Set to null if empty.
     *
     * @param $input
     */
    public function setCustomerIdAttribute($input)
    {
        $this->attributes['customer_id'] = $input ? $input : null;
    }

    /**
     * Get the first name and last name
     * Accessor.
     *
     * @param string $value
     *
     * @return string
     */
    public function getFullNameAttribute($value)
    {
        return ucfirst($this->first_name).' '.ucfirst($this->last_name);
    }

    /**
     * Get the first name.
     * Accessor.
     *
     * @param string $value
     *
     * @return string
     */
    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Get the last name.
     * Accessor.
     *
     * @param string $value
     *
     * @return string
     */
    public function getLastNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Set the first name.
     * Mutator.
     *
     * @param string $value
     *
     * @return string
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = strtolower($value);
    }

    /**
     * Set the last name.
     * Mutator.
     *
     * @param string $value
     *
     * @return string
     */
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = strtolower($value);
    }

    /**
     * Relationships.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id')->withTrashed();
    }
}
