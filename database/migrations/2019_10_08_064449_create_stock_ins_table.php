<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_ins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cat_id')->notnull();
            $table->string('product')->notnull();
            $table->string('vendor')->notnull();
            $table->integer('quantity')->notnull();
            $table->integer('current_quantity')->notnull();
            $table->double('buy_price')->notnull();
            $table->double('sell_price')->notnull();
            $table->double('total_sell_amount')->notnull();
            $table->string('chalan_date')->notnull();
            $table->String('notes')->nullable();
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
        Schema::dropIfExists('stock_ins');
    }
}
