<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleFluidSpecificationsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
      Schema::create('vehicle_fluid_specifications', function (Blueprint $table) {
        $table->integer('vehicle_id')->unsigned();
        $table->primary('vehicle_id');
        $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
        $table->integer('oil_type_id')->unsigned();
        $table->foreign('oil_type_id')->references('id')->on('oil_types')->onUpdate('cascade');
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
      Schema::drop('vehicle_fluid_specifications');
  }
}
