<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable(true);
            $table->string('first_name', 60)->nullable(false);
            $table->string('last_name', 60)->nullable(true);
            $table->string('phone_number', 30)->nullable(false);
            $table->string('address', 125)->nullable(false);
            $table->unsignedDecimal('discount')->default(0);
            $table->unsignedDecimal('tax')->default(0);
            $table->boolean('is_received')->default(false);
            $table->boolean('is_checked_out')->default(false);
            $table->timestamp('shipped_at');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
