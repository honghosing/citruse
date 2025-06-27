<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'telephone',
    ];

    /**
     * @return HasMany
     */
    public function businessesAsSales() : HasMany
    {
        return $this->hasMany(Business::class, 'primary_sales_contact_id');
    }

    /**
     * @return HasMany
     */
    public function businessesAsLogistics() : HasMany
    {
        return $this->hasMany(Business::class, 'primary_logistics_contact_id');
    }
}
