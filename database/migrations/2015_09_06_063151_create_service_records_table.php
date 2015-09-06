<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('service_records', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('vehicle_id')->unsigned();
        $table->foreign('vehicle_id')->references('id')->on('vehicles');
        $table->integer('type_id')->unsigned();
        $table->text('other_description');
        $table->integer('mileage_performed_at')->unsigned();
        $table->date('performed_on')->nullable();
        $table->text('notes');
        $table->softDeletes()->nullable();
        $table->nullableTimestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('service_records');
    }
  }
