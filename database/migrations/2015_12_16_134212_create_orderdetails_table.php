
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderdetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orderdetails', function(Blueprint $table)
		{
			$table->increments('id');
			$table->tinyInteger('quality_room');
			$table->tinyInteger('quality_car');
			$table->integer('car_id')->unsigned();
			$table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
			$table->integer('tour_id')->unsigned();
			$table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');
			$table->integer('room_id')->unsigned();
			$table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orderdetails');
	}

}