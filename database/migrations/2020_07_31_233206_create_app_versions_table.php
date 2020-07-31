<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppVersionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('app_versions', function (Blueprint $table) {
			$table->string('version')->comment('アプリのバージョン');
			$table->integer('platform_id')->comment('プラットフォームのID');
			$table->string('url')->comment('ストアのURL');
			$table->string('title')->comment('タイトル');
			$table->string('message')->comment('メッセージ');
			$table->timestamps();

			$table->primary(['version', 'platform_id']);
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('app_versions');
	}
}
