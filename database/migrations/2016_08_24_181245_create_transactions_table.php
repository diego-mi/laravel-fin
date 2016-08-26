<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            #table columns
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->date('purchase_at')->nullable()->default(date(timestadate("Y/m/d H:i:s")));
            $table->date('payment_at')->nullable()->default(date(timestadate("Y/m/d H:i:s")));
            $table->float('value');
            $table->timestamps();

            #foreign keys
            $table->integer('category_id')->unsigned();
            $table->integer('source_id')->unsigned();
            $table->integer('user_id')->unsigned();

            #foreign keys references
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('source_id')->references('id')->on('sources');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transactions');
    }
}
