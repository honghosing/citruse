<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Business extends Model
{
    protected $fillable = [
        'name',
        'address',
        'country',
        'vat_number',
        'business_type',
        'primary_sales_contact_id',
        'primary_logistics_contact_id',
    ];

    /**
     * @return BelongsTo
     */
    public function salesContact() : BelongsTo
    {
        return $this->belongsTo(Contact::class, 'primary_sales_contact_id');
    }

    /**
     * @return BelongsTo
     */
    public function logisticsContact() : BelongsTo
    {
        return $this->belongsTo(Contact::class, 'primary_logistics_contact_id');
    }

    /**
     * @return HasMany
     */
    public function orders() : HasMany
    {
        return $this->hasMany(Order::class);
    }
}
