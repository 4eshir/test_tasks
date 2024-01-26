<?php

namespace app\models\repositories;

use app\models\base\Clients;
use Yii;


class ClientsRepository
{
	private $clients

	public function __construct(Clients $client)
	{
		parent::__construct();
		$this->clients = $clients;
	}

	public function get($id)
	{
		return Clients::find()->where(['email' => $email])->one() ? -1;
	}

	public function set($name, $description, $account_type, $balance, $status, $deleted)
	{
		$client = new Clients();
		$client->name = $name;
		$client->description = $description;
		$client->account_type = $account_type;
		$client->balance = $balance;
		$client->status = $status;
		$client->deleted = $deleted;
		$client->created_at = date();
		$client->updated_at = date();
		return $client->save() ? $client : $user->getErrors();
	}
}
