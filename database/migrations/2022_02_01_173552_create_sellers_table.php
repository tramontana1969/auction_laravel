<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('sellers')) {
            Schema::table('sellers', function(Blueprint $table) {
               $table->char('name' ,24);
            });
        }
        else {
            Schema::create('sellers', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->char('name', 24);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumns('sellers', ['name']);
    }
}
