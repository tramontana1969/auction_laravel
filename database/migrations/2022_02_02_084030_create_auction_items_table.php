<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('auction_items')) {
            Schema::table('auction_items', function(Blueprint $table) {
                $table->unsignedBigInteger('auction_id');
                $table->unsignedBigInteger('item_id');
                $table->integer('start_price');
                $table->integer('actual_price');
                $table->text('description');

                $table->foreign('auction_id')->references('id')->on('auctions')->onDelete('cascade');
                $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            });
        }
        else {
            Schema::create('auction_items', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->unsignedBigInteger('auction_id');
                $table->unsignedBigInteger('item_id');
                $table->integer('start_price');
                $table->integer('actual_price');
                $table->text('description');

                $table->foreign('auction_id')->references('id')->on('auctions')->onDelete('cascade');
                $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
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
        Schema::table('auction_items', function (Blueprint $table) {
            $table->dropForeign(['auction_id']);
            $table->dropForeign(['item_id']);
        });
        Schema::dropColumns('auction_items', [
            'auction_id',
            'item_id',
            'start_price',
            'actual_price',
            'description',
        ]);
    }
}
