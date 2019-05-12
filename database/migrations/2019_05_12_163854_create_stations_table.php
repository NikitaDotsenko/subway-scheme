<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 40);
            $table->string('logo')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedBigInteger('prev_station_id')->nullable();
            $table->unsignedBigInteger('next_station_id')->nullable();
            $table->timestamps();
        });

        Schema::table('stations', function (Blueprint $table) {
            $table->foreign('branch_id')
                ->references('id')
                ->on('branches');

            $table->foreign('prev_station_id')
                ->references('id')
                ->on('stations');

            $table->foreign('next_station_id')
                ->references('id')
                ->on('stations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stations');
    }
}
