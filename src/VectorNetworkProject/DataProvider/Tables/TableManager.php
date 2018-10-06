<?php
/**
 * Created by PhpStorm.
 * User: UramnOIL
 * Date: 2018/10/06
 * Time: 22:49
 */

namespace VectorNetworkProject\DataProvider\Tables;


use poggit\libasynql\base\DataConnectorImpl;
use VectorNetworkProject\DataProvider\Tables\Accounts\Accounts;
use VectorNetworkProject\DataProvider\Tables\Dual\Dual;
use VectorNetworkProject\DataProvider\Tables\FFAPvP\FFAPvP;

class TableManager
{
	/** @var DataConnectorImpl */
	protected $connector;

	/** @var Accounts */
	protected $accounts;
	/** @var FFAPvP */
	protected $ffapvp;
	/** @var Dual */
	protected $dual;

	public function __construct(DataConnectorImpl $connector)
	{
		$this->connector = $connector;
		$this->accounts = new Accounts($connector);
		$this->ffapvp = new FFAPvP($connector);
		$this->dual = new Dual($connector);
	}

	/**
	 * @return Accounts
	 */
	public function getAccounts(): Accounts
	{
		return $this->accounts;
	}

	/**
	 * @return FFAPvP
	 */
	public function getFfapvp(): FFAPvP
	{
		return $this->ffapvp;
	}

	/**
	 * @return Dual
	 */
	public function getDual(): Dual
	{
		return $this->dual;
	}
}