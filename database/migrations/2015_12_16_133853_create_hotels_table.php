
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hotels', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',300);
			$table->text('des');
			$table->string('location');
			$table->string('checkin',20);
			$table->string('checkout',20);
			$table->text('extrarule');
			$table->string('pet',300);
			$table->string('payment');
			$table->string('facilities');
			$table->tinyInteger('star');
			$table->text('images');
			$table->text('map');
			$table->boolean('status');
			$table->boolean('showatindex');
			$table->integer('tour_id')->unsigned();
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
		Schema::drop('hotels');
	}

}