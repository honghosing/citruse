<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stock extends Model
{
    protected $fillable = [
        'product_code',
        'description',
        'quantity',
    ];


    /**
     * @return HasMany
     */
    public function prices(): HasMany
    {
        return $this->hasMany(StockPrice::class);
    }

    /**
     * @return HasMany
     */
    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }
}
