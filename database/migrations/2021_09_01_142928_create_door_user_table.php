<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoorUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('door_user', function (Blueprint $table) {
            $table->primary(['door_id', 'user_id']);
            $table->unsignedBigInteger('door_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('door_id')->references('id')->on('doors')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('door_user');
    }
}
