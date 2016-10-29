
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rooms', function(Blueprint $table)
		{

			$table->increments('id');
			$table->string('name');
			$table->tinyInteger('quality');
			$table->tinyInteger('maxperson');
			$table->integer('price');
			$table->text('images');
			$table->text('calendar');
			$table->string('facilities');
			$table->boolean('status');
			$table->integer('hotel_id')->unsigned();
			$table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
			$table->string('created_by',32);
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
		Schema::drop('rooms');
	}

}
