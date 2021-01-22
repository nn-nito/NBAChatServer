<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameSchedulesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('game_schedules', function (Blueprint $table) {
			$table->id();
			$table->dateTime('start_datetime')->comment('試合開始時間');
			$table->dateTime('end_datetime')->comment('試合終了時間');
			$table->integer('home_team_id')->comment('ホームのチームID');
			$table->integer('away_team_id')->comment('アウェイのチームID');
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
		Schema::dropIfExists('game_schedules');
	}
}
