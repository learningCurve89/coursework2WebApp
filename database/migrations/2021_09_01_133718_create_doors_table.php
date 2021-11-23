<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Each door must have a unique name.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doors', function (Blueprint $table) {
            $table->id();
            // Note we want to enforce that the database only stores unique names.
            $table->string('name')->unique();
            // zone_id must be nullable as doors do not have to be part of a zone.
            $table->unsignedBigInteger('zone_id')->nullable();
            $table->timestamps();

            $table->foreign('zone_id')->references('id')->on('zones')
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
        Schema::dropIfExists('doors');
    }
}
