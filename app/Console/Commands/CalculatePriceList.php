<?php

namespace App\Console\Commands;

use App\Services\PriceListService;
use Illuminate\Console\Command;

class CalculatePriceList extends Command
{

    /**
     * @var PriceListService
     */
    private $priceListService;


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculate:price_list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculates price list by role discount';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {

        parent::__construct();
        $this->priceListService = app(PriceListService::class);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->priceListService->calculatePricesByRoles();
        $this->info('Price list was calculated successfully!');
    }
}
