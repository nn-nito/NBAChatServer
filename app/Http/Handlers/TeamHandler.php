<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2021/01/20
 * Time: 19:31
 */

namespace App\Http\Handlers;

use App\Team;

/**
 * Class TeamHandler
 *
 * @package App\Http\Handlers
 */
class TeamHandler
{
	/**
	 * @var Team
	 */
	private $team;



	/**
	 * TeamHandler constructor.
	 */
	public function __construct()
	{
		$this->team = new Team();
	}



	/**
	 * チームとそのリザルトを全て取得
	 *
	 * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
	 */
	public function fetchAllTeamsJoinGameResult()
	{
		return $this->team::query()
			->select(
				'teams.id as id',
				'name',
				'abbreviation',
				'room_id',
				'win_count',
				'lose_count'
			)
			->leftJoin('game_results', 'teams.id', '=', 'game_results.team_id')
			->get();
	}
}