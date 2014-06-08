<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYardsalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Yardsales', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->string('title', 255);
			$table->text('description', 5000);
			$table->string('folder_id', 100);
			$table->string('address', 255);
			$table->string('city', 50);
			$table->decimal('lat', 15, 13);
			$table->decimal('lng', 15, 13);
			$table->boolean('active');
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
		Schema::drop('Yardsales');
	}

}
