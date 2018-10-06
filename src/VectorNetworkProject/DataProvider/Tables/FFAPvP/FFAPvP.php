<?php
/**
 * Created by PhpStorm.
 * User: UramnOIL
 * Date: 2018/10/06
 * Time: 22:46
 */

namespace VectorNetworkProject\DataProvider\Tables\FFAPvP;

use pocketmine\IPlayer;
use VectorNetworkProject\DataProvider\Tables\Queries;
use VectorNetworkProject\DataProvider\Tables\TableBase;

class FFAPvP extends TableBase
{
	public const FFAPVP_INIT = 'userdataprovider.ffapvp.init';
	public const FFAPVP_REGISTER = 'userdataprovider.ffapvp.register';
	public const FFAPVP_UNREGISTER = 'userdataprovider.ffapvp.unregister';
	public const FFAPVP_GET_RANKING_BY_KILL = 'userdataprovider.ffapvp.getrankingbykill';
	public const FFAPVP_GET_RANKING_BY_EXP = 'userdataprovider.ffapvp.getrankingbyexp';

	public function init(): void
	{
		$this->connector->executeGeneric(self::FFAPVP_INIT);
	}

	/**
	 * プレイヤーを登録します。
	 *
	 * @param IPlayer $player
	 * @param callable|null $onInserted
	 * @param callable|null $onError
	 */
	public function register(IPLayer $player, ?callable $onInserted = null, ?callable $onError = null): void
	{
		$this->connector->executeInsert(self::FFAPVP_REGISTER, [$player->getname()], $onInserted, $onError);

	}

	/**
	 * プレイヤーを登録解除します
	 *
	 * @param IPlayer $player
	 * @param callable|null $onSuccess
	 * @param callable|null $onError
	 */
	public function unregister(IPLayer $player, ?callable $onSuccess = null, ?callable $onError = null): void
	{
		$this->connector->executeChange(self::FFAPVP_UNREGISTER, $onSuccess, $onError );
	}

	/**
	 * キル数のランキングを取得します
	 *
	 * @param int $limit
	 * @param callable|null $onSelect
	 * @param callable|null $onError
	 */
	public function getRankingByKill(int $limit, ?callable $onSelect = null, ?callable $onError = null): void
	{
		$this->connector->executeSelect(self::FFAPVP_GET_RANKING_BY_KILL);
	}

	/**
	 * EXPのランキングを取得します
	 *
	 * @param int $limit
	 * @param callable|null $onSelect
	 * @param callable|null $onError
	 */
	public function getRankingByExp(int $limit, ?callable $onSelect = null, ?callable $onError = null): void
	{
		$this->connector->executeSelect(self::FFAPVP_GET_RANKING_BY_EXP);
	}
}