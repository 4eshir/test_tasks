<?php

namespace app\models\work;

use app\models\base\Clients;
use Yii;


class ClientsWork extends Clients
{
	private $usersClients;

	public function __construct(Clients $client, UsersClientsWork $usersClients)
	{
		parent::__construct();
		
		$this->userClients = $usersClients;
	}

	public function checkBalance($comparedBalance)
	{
		return $this->balance >= $comparedBalance
	}

	//--Новый функционал--

	public function addBunch($email)
	{
		$this->usersClients->createBunch($this->id, $email);
	}

	public function deleteBunch($email)
	{
		$this->usersClients->deleteBunch($this->id, $email);
	}
}
