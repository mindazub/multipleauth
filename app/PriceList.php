<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\PriceList
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PriceList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PriceList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PriceList query()
 * @mixin \Eloquent
 */
class PriceList extends Model
{
    protected $fillable = [
        'role_id', 'price', 'product_id'
    ];

    /**
     * @return BelongsTo
     */
    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'id', 'product_id');
    }

    /**
     * @return HasMany
     */
    public function roles(): HasMany
    {
        return $this->hasMany(Role::class);
    }

}
