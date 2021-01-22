<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2021/01/20
 * Time: 19:00
 */

namespace App\Http\Handlers;

use App\GameSchedule;

/**
 * Class GameScheduleHandler
 *
 * @package App\Http\Handlers
 */
class GameScheduleHandler
{
	/**
	 * @var GameSchedule
	 */
	private $game_schedule;



	/**
	 * GameScheduleHandler constructor.
	 */
	public function __construct()
	{
		$this->game_schedule = new GameSchedule();
	}



	/**
	 * 指定された日付に行われる試合をすべて取得
	 *
	 * @param string $date ex) 2021-01-20
	 * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
	 */
	public function fetchSchedulesByDate(string $date)
	{
		return $this->game_schedule::query()
			->whereDate('start_datetime', $date)
			->orderBy('start_datetime', 'ASC')
			->get();
	}
}