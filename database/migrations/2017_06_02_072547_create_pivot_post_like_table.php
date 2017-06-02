<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePivotPostLikeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pivot_post_like', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('post_id')->unsigned()->nullable()->index('index2');
			$table->integer('user_id')->unsigned()->nullable()->index('index3');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pivot_post_like');
	}

}
