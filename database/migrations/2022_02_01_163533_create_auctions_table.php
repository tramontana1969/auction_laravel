<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('auctions')){
            Schema::table('auctions', function (Blueprint $table){
                $table->date('date');
                $table->time('time');
                $table->char('place', 64);
                $table->text('description');
            });
        }
        else {
            Schema::create('auctions', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->date('date');
                $table->time('time');
                $table->char('place', 64);
                $table->text('description');
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
        Schema::dropColumns('auctions', [
            'description',
            'place',
            'time',
            'date',
        ]);
    }
}
