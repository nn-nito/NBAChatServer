<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameResultsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('game_results', function (Blueprint $table) {
			$table->id();
			$table->integer('team_id')->comment('チームID');
			$table->integer('win_count')->comment('勝利回数');
			$table->integer('lose_count')->comment('敗北回数');
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
		Schema::dropIfExists('game_results');
	}
}
