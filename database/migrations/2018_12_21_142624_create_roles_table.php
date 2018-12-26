<?php

use App\Role;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->double('discount', 10, 2)->default(0);
            $table->timestamps();
        });

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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
