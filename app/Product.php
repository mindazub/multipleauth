<?php

declare(strict_types = 1);
namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Category;

/**
 * Class Product
 * @package App
 */
class Product extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'sku',
        'title',
        'slug',
        'shortDescription',
        'description',
        'retailPrice',
        'wholeSalePrice',
        'picture_one',
        'picture_two',
        'picture_three',
        'qty',
        'reference_product_id',
    ];

    /**
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

}
