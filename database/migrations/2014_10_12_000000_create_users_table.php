<?php

use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('role_id')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
