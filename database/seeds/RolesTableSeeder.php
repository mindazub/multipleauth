<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Create three users for Retail, Wholesate and Custom
         */

        Role::create([
            'title' => 'Retail',
            'discount' => 0,
        ]);
        Role::create([
            'title' => 'Wholesale',
            'discount' => 25,
        ]);
        Role::create([
            'title' => 'Custom',
            'discount' => 30,
        ]);
    }
}
