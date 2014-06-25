<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddVisibleToYardsalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('yardsales', function(Blueprint $table)
		{
			$table->boolean('visible');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('yardsales', function(Blueprint $table)
		{
			$table->dropColumn('visible');
		});
	}

}
