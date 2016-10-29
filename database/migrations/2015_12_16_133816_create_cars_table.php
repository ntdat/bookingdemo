
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cars', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',300);
			$table->integer('price');
			$table->tinyInteger('quality');
			$table->text('images');
			$table->text('des');
			$table->boolean('status');
			$table->boolean('showatindex');
			$table->string('facilities');
			$table->integer('tour_id')->unsigned();
			$table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');
			$table->string('created_by', 32);
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
		Schema::drop('cars');

	}

}
