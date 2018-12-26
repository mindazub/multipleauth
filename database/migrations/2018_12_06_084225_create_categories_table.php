<?php

use App\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->integer('reference_category_id')->nullable();
            $table->timestamps();
        });

        /**
         * Create categories
         */

        Category::create([
            'title' => 'SALE',
            'slug' => 'sale',
        ]);
        Category::create([
            'title' => 'IP VIDEO SURVEILANCE',
            'slug' => 'ip-video-surveilance',
        ]);
        Category::create([
            'title' => 'ANALOGUE VIDEO SURVEILANCE',
            'slug' => 'analogue-video-surveilance',
        ]);
        Category::create([
            'title' => 'INTRUSION DETECTION',
            'slug' => 'intrusion-detection',
        ]);
        Category::create([
            'title' => 'SMOKE GENERATORS',
            'slug' => 'smoke-generators',
        ]);
        Category::create([
            'title' => 'FIRE',
            'slug' => 'fire',
        ]);
        Category::create([
            'title' => 'BATTERIES / POWER SUPPLY',
            'slug' => 'batteries-power-supply',
        ]);
        Category::create([
            'title' => 'ACCESS CONTROL',
            'slug' => 'access-control',
        ]);
        Category::create([
            'title' => 'INTERCOM',
            'slug' => 'intercom',
        ]);
        Category::create([
            'title' => 'NETWORK EQUIPMENT',
            'slug' => 'network-equipment',
        ]);
        Category::create([
            'title' => 'WIRE & CABLE',
            'slug' => 'wire-and-cable',
        ]);
        Category::create([
            'title' => 'MAINTENANCE AND REPAIR',
            'slug' => 'maintenance-and-repair',
        ]);
        Category::create([
            'title' => 'NURSE CALL SYSTEMS',
            'slug' => 'nurse-call-systems',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
