<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYardsaleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yardsale', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');			
			$table->string('city', 20);			
			$table->string('address', 255);			
			$table->string('title', 255);			
			$table->text('description');			
			$table->string('folder_id', 60);	
			$table->decimal('lat', 15, 10);
	    $table->decimal('lng', 15, 10);		
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
		Schema::drop('yardsale');
	}

}
