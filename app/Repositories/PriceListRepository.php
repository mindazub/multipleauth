<?php
/**
 * Created by PhpStorm.
 * User: mind
 * Date: 18.8.6
 * Time: 20.39
 */

namespace App\Repositories;


use App\PriceList;

class PriceListRepository extends Repository
{

    /**
     * @return string
     */
    public function model(): string
    {
        return PriceList::class;
    }

    /**
     * @return int
     * @throws \Exception
     */
    public function getPriceListCount(): int
    {
        return $this->makeQuery()->count();
    }

}
