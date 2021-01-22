<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teams', function (Blueprint $table) {
			$table->id();
			$table->string('name')->comment('チーム名');
			$table->string('abbreviation')->comment('チーム名の略称');
			$table->integer('room_id')->comment('ルームID');
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
		Schema::dropIfExists('teams');
	}
}
