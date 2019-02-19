<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Create admin user
         *
         * @return void
         */

        Admin::create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);
    }
}
