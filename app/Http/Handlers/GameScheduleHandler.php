<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2021/01/20
 * Time: 19:00
 */

namespace App\Http\Handlers;

use App\GameSchedule;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

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
	 * @return Builder[]|Collection
	 */
	public function fetchSchedulesByDate(string $date)
	{
		return $this->game_schedule::query()
			->whereDate('start_datetime', $date)
			->orderBy('start_datetime', 'ASC')
			->get();
	}



	/**
	 * 指定された日時で試合中のスケジュールを取得
	 *
	 * @param string $datetime 現在の日時
	 * @return Builder[]|Collection
	 */
	public function fetchSchedulesByBetweenDateAndTime(string $datetime)
	{
		return $this->game_schedule::query()
			->where('start_datetime', '<=', $datetime)
			->where('end_datetime', '>=', $datetime)
			->orderBy('start_datetime', 'ASC')
			->get();
	}
}