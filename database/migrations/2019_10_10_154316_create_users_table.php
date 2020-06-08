<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name', 60)->nullable(false);
            $table->string('last_name', 60)->nullable(true);
            $table->string('username', 100)->unique()->nullable(false);
            $table->string('email', 125)->unique()->nullable(false);
            $table->string('password', 125)->nullable(false);
            $table->string('phone_number', 30)->nullable(true);
            $table->string('address', 125)->nullable(true);
            $table->boolean('is_admin')->default(false);
            $table->unsignedMediumInteger('gender_id')->nullable(true);
            $table->unsignedBigInteger('image_id')->nullable(true);
            $table->text('bio')->nullable(true);
            $table->string('api_token', 125)->nullable(true);
            $table->timestamps();

            $table->foreign('gender_id')
                ->references('id')
                ->on('genders')
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
        Schema::dropIfExists('users');
    }
}
