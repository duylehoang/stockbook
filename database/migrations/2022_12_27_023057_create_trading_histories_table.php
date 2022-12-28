<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradingHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trading_histories', function (Blueprint $table) {
            $table->id();
            $table->date('trading_date');
            $table->char('code', 3);
            $table->integer('number');
            $table->integer('buy_price');
            $table->integer('sell_price')->nullable();
            $table->bigInteger('profit')->nullable();
            $table->integer('number_t')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trading_histories');
    }
}
