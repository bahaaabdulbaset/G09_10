<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100)->nullable(false)->unique();
            $table->unsignedBigInteger('category_id')->nullable(true);
            $table->unsignedDecimal('selling_price')->default(0);
            $table->unsignedDecimal('buying_price')->default(0);
            $table->unsignedDecimal('discount')->default(0);
            $table->unsignedBigInteger('image_id')->nullable(true);
            $table->boolean('is_available')->default(true);
            $table->boolean('is_new')->default(true);
            $table->boolean('is_upcoming')->default(true);
            $table->unsignedInteger('amount')->default(1);
            $table->text('description')->nullable(true);
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');

            $table->foreign('image_id')
                ->references('id')
                ->on('images')
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
        Schema::dropIfExists('products');
    }
}
