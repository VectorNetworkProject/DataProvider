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
	public const INIT = 'userdataprovider.dual.init';
	public const REGISTER = 'userdataprovider.dual.register';
	public const UNREGISTER = 'userdataprovider.dual.unregister';
	public const GET = 'userdataprovider.dual.get';
	public const ADD_COUNT = 'userdataprovider.dual.addcount';
	public const GET_RANKING = 'userdataprovider.dual.getranking';

	public function init(): void
	{
		$this->connector->executeGeneric(self::INIT);
	}

	/**
	 * @param IPlayer $player
	 * @param callable $onInserted
	 * @param callable|null $onError
	 */
	public function register(IPlayer $player, callable $onInserted, ?callable $onError = null): void
	{
		$this->connector->executeInsert(self::REGISTER, [$player->getName()], $onInserted, $onError);
	}

	/**
	 * @param IPlayer $player
	 * @param callable|null $onSelect
	 * @param callable|null $onError
	 */
	public function unregister(IPlayer $player, ?callable $onSelect, ?callable $onError = null): void
	{
		$this->connector->executeChange(self::REGISTER, [$player->getName()], $onSelect, $onError);
	}

	/**
	 * @param IPlayer $player
	 * @param callable $onSelect
	 * @param callable|null $onError
	 */
	public function get(IPlayer $player, callable $onSelect, ?callable $onError = null): void
	{
		$this->connector->executeSelect(self::GET, [$player->getName()], $onSelect, $onError);
	}

	/**
	 * @param IPlayer $player
	 * @param int $kill
	 * @param int $death
	 * @param int $win
	 * @param int $lose
	 * @param callable|null $onSelect
	 * @param callable|null $onError
	 */
	public function add(IPlayer $player, int $kill = 0, int $death = 0, int $win = 0, int $lose = 0, ?callable $onSelect = null, ?callable $onError = null): void
	{
		$this->connector->executeChange(self::ADD_COUNT, [$player->getName(), $kill, $death, $win, $lose], $onSelect, $onError);
	}

	/**
	 * @param IPlayer $player
	 * @param int $kill
	 */
	public function addKill(IPlayer $player, int $kill): void
	{
		$this->add($player, $kill);
	}

	/**
	 * @param IPlayer $player
	 * @param int $death
	 */
	public function addDeath(IPlayer $player, int $death): void
	{
		$this->add($player, 0, $death);
	}

	/**
	 * @param IPlayer $player
	 * @param int $win
	 */
	public function addWin(IPlayer $player, int $win): void
	{
		$this->add($player, 0, 0, $win);
	}

	/**
	 * @param IPlayer $player
	 * @param int $lose
	 */
	public function addLose(IPlayer $player, int $lose): void
	{
		$this->add($player, 0, 0, 0, $lose);
	}

	/**
	 * @param int $limit
	 * @param callable $onSelect
	 * @param callable|null $onError
	 */
	public function getRanking(int $limit, callable $onSelect, ?callable $onError = null): void
	{
		$this->connector->executeSelect(self::GET_RANKING, [$limit], $onSelect, $onError);
	}
}