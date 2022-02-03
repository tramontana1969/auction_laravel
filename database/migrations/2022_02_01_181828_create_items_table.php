<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   if (Schema::hasTable('items')) {
            Schema::table('items', function (Blueprint $table) {
               $table->char('name', 48);
               $table->integer('lot')->nullable();
               $table->unsignedBigInteger('seller_id');
               $table->unsignedBigInteger('customer_id')->nullable();

               $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
               $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            });
    }
        else {
            Schema::create('items', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->char('name', 48);
                $table->integer('lot')->nullable();
                $table->unsignedBigInteger('seller_id');
                $table->unsignedBigInteger('customer_id')->nullable();

                $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
                $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
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
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign(['seller_id']);
            $table->dropForeign(['customer_id']);
        });
        Schema::dropColumns('items', ['name', 'lot' ,'seller_id', 'customer_id']);
    }
}
