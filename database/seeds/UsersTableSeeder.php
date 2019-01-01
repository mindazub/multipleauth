<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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

        User::create([
            'name' => 'retail',
            'email' => 'retail@retail.com',
            'password' => bcrypt('retail'),
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'wholesate',
            'email' => 'wholesate@wholesate.com',
            'password' => bcrypt('wholesate'),
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'custom',
            'email' => 'custom@custom.com',
            'password' => bcrypt('custom'),
            'role_id' => 3,
        ]);
    }
}
