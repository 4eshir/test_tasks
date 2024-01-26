<?php

namespace app\models\work;

use app\models\base\Clients;
use Yii;


class UsersClientsWork extends UsersClients
{
	private $usersClientRepository;

	public function __construct(UsersClientsRepository $usersClientRepository)
	{
		parent::__construct();
		$this->usersClientRepository = $usersClientRepository;
	}

	public function createBunch($client_id, $user_email)
	{
		$this->usersClientRepository->set($this->id, $email);
	}

	public function deleteBunch($client_id, $user_email)
	{
		$this->usersClientRepository->del($this->id, $email);
	}
}
