<?php

namespace App\Http\Controllers;

use App\Http\Handlers\GameScheduleHandler;
use App\Http\Handlers\TeamHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
	/**
	 * 指定された日付のスケジュールを取得
	 *
	 * @param Request $request
	 * @return JsonResponse
	 * @throws \Exception
	 */
    public function schedule(Request $request): JsonResponse
	{
		$now = $request->get('now');
		if (is_null($now)) {
			return  response()->json([]);
		}

		$now_date = (new \DateTime($now))->format('Y-m-d');
		// 指定された日付の全ての試合を取得
		$responses['game_schedules'] = (new GameScheduleHandler())->fetchSchedulesByDate($now_date);

		// 指定された日付の試合をするチーム取得 リザルトもjoinしてもってくる
		$responses['teams_results'] = (new TeamHandler())->fetchAllTeamsJoinGameResult();

		return response()->json($responses);
	}



	/**
	 * 指定された日時で試合中のスケジュールを取得
	 *
	 * @param Request $request
	 * @return JsonResponse
	 * @throws \Exception
	 */
	public function duringSchedule(Request $request): JsonResponse
	{
		$datetime_string = $request->get('datetime');
		if (is_null($datetime_string)) {
			return  response()->json([]);
		}

		$datetime = (new \DateTime($datetime_string))->format('Y-m-d H:i:s');
		// 指定された日時で試合中の全ての試合を取得
		$responses['game_schedules'] = (new GameScheduleHandler())->fetchSchedulesByBetweenDateAndTime($datetime);

		// 指定された日時の試合をするチーム取得 リザルトもjoinしてもってくる
		$responses['teams_results'] = (new TeamHandler())->fetchAllTeamsJoinGameResult();

		return response()->json($responses);
	}
}
