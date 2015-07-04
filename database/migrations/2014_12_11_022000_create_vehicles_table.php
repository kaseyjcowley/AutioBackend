<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehiclesTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('vehicles', function(Blueprint $table) {
      $table->increments('id');
      $table->smallInteger('year')->nullable();
      $table->integer('model_id')->unsigned();
      $table->foreign('model_id')->references('id')->on('models')->onDelete('cascade');
      $table->integer('mileage')->unsigned();
      $table->char('vin', 17);
      $table->timestamps();
    });
  }


  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('vehicles');
  }

}
