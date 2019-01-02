<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Pricelist
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pricelist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pricelist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pricelist query()
 * @mixin \Eloquent
 */
class Pricelist extends Model
{
    protected $fillable = [
        'role_id', 'price', 'product_id'
    ];

    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * @return HasMany
     */
    public function roles(): HasMany
    {
        return $this->hasMany(Role::class);
    }

}
