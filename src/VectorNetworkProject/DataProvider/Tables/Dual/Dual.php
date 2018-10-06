<?php
/**
 * Created by PhpStorm.
 * User: UramnOIL
 * Date: 2018/10/07
 * Time: 0:50
 */

namespace VectorNetworkProject\DataProvider\Tables\Dual;

use pocketmine\IPlayer;
use VectorNetworkProject\DataProvider\Tables\TableBase;

class Dual extends TableBase
{
	public function init(): void
	{
		// TODO: Implement init() method.
	}

	public function register(IPlayer $player): void
	{

	}

	public function unregister(IPlayer $player): void
	{

	}

	public function get(IPlayer $player, callable $onSelect, ?callable $onError = null): void
	{

	}

	public function addCount(IPlayer $player, int $kill, int $death, int $win, int $lose, callable $onSelect, ?callable $onError = null): void
	{

	}

	public function getRanking(int $limit, callable $onSelect, ?callable $onError = null): void
	{

	}
}