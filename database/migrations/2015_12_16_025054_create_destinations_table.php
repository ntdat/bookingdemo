<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('destinations', function(Blueprint $table)
		{

			$table->increments('id');
			$table->string('name',100);
			$table->text('images');
			$table->text('des');
			$table->boolean('showatindex');
			$table->tinyInteger('status');
			$table->string('created_by',32);
			$table->integer('cate_id')->unsigned();
			$table->foreign('cate_id')->references('id')->on('categories')->onDelete('cascade');
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
		Schema::table('destinations', function(Blueprint $table)
		{
			//
		});
	}

}
