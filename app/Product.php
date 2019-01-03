<?php

declare(strict_types = 1);
namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Product
 *
 * @package App
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $sku
 * @property string $title
 * @property string $slug
 * @property string|null $shortDescription
 * @property string|null $description
 * @property float|null $retailPrice
 * @property float|null $wholeSalePrice
 * @property string|null $picture_one
 * @property string|null $picture_two
 * @property string|null $picture_three
 * @property int|null $qty
 * @property int|null $reference_product_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Category[] $categories
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePictureOne($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePictureThree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePictureTwo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereReferenceProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereRetailPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereWholeSalePrice($value)
 * @mixin \Eloquent
 * @property-read \App\PriceList $pricelist
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

    /**
     * @return belongsTo
     */
    public function priceList(): BelongsTo
    {
        return $this->belongsTo(PriceList::class, 'product_id', 'id');
    }
}
