<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/07/23
 * Time: 0:34
 */

namespace App\Http\Services\Radio;

use App\Http\Handlers\RadioHandler;
use Illuminate\Support\Collection;
use PhpParser\Builder;

/**
 * ラジオ取得
 */
class RadioFetcher
{
	private $radio_handler;



	/**
	 * デフォルト構成でインスタンス生成
	 *
	 * @return RadioFetcher
	 */
	public static function create(): RadioFetcher
	{
		return new self(new RadioHandler());
	}



	/**
	 * RadioFetcher constructor.
	 *
	 * @param RadioHandler $radio_handler
	 */
	public function __construct(RadioHandler $radio_handler)
	{
		$this->radio_handler = $radio_handler;
	}



	/**
	 * 曜日と現在時間で現在放送中のラジオをすべて取得
	 *
	 * @param int    $day_of_week  曜日 0(日)~6(土)
	 * @param string $current_time 現在時間 例)00:00:00
	 * @return Builder[]|Collection
	 */
	public function fetchAllNowOnAirByDayOfWeekAndCurrentTime(int $day_of_week, string $current_time)
	{
		return $this->radio_handler->fetchAllNowOnAirByDayOfWeekAndCurrentTime($day_of_week, $current_time);
	}
}