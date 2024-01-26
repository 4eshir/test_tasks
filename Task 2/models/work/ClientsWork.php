<?php

namespace app\models\work;

use app\models\base\Clients;
use Yii;


class ClientsWork extends Clients
{
	public function __construct(Clients $client)
	{
		parent::__construct();
		// специфическая реализация
	}

	public function checkBalance($comparedBalance)
	{
		return $this->balance >= $comparedBalance
	}
}
