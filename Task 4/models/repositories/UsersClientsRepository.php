<?php

namespace app\models\repositories;

use app\models\base\Users;
use Yii;


class UsersClientsRepository
{
	private $usersClients;
	private $usersRepository;

	public function __construct(UsersClients $usersClients)
	{
		parent::__construct();
		$this->usersClients = $usersClients;
		$this->usersRepository = new usersRepository(new User($usersClients->users->email));
	}

	public function get($client_id, $users_email)
	{
		$user_id = $this->usersRepository->get($users_email)->id;
		return UsersClients::find()->where(['users_id' => $user_id])->andWhere(['clients_id' => $client_id])->one() ? -1;
	}

	public function set($client_id, $users_email)
	{
		$user_id = $this->usersRepository->get($users_email)->id;
		$usersClients = new UsersClients();
		$usersClients->users_id = $user_id;
		$usersClients->clients_id = $client_id;
		return $usersClients->save() ? $usersClients : $usersClients->getErrors();
	}

	public function del($client_id, $users_email)
	{
		$user_id = $this->usersRepository->get($users_email)->id;
		$usersClients = UsersClients::find()->where(['clients_id' => $client_id])->andWhere(['users_id' => $user_id])->one();
		if ($usersClients) return $usersClients->delete();
		return false;
	}
}
