

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tours', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',500);
			$table->text('intro');
			$table->text('nature');
			$table->text('nightlife');
			$table->text('history');
			$table->string('location');
			$table->integer('area');
			$table->boolean('visa');
			$table->string('currency');
			$table->string('language');
			$table->text('images');
			$table->string('map');
			$table->boolean('status');
			$table->boolean('showatindex');
			$table->boolean('showatoffer');
			$table->integer('destinasion_id')->unsigned();
			$table->foreign('destinasion_id')->references('id')->on('destinations')->onDelete('cascade');
			$table->integer('cate_id')->unsigned();
			$table->foreign('cate_id')->references('id')->on('categories')->onDelete('cascade');
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
		Schema::drop('tours');
	}

}
