<?php

namespace app\models\work;

use app\models\base\Users;
use Yii;


class UsersWork extends Users
{
	private $authTokensRepository;

	public function __construct(AuthTokensRepository $authTokensRepository)
	{
		parent::__construct();
		$this->authTokensRepository = $authTokensRepository;
	} 

	public function getFullName()
	{
		$nameSex = $this->name. ($this->sex ? 'М' : 'Ж');
		$prettyStatus = {
			// к-либо взаимодействие со status_id
			$status_id;
		}
		return $nameSex.' ('.$prettyStatus.')';
	}


	//--Новый функционал--

	public function getGroupType()
	{
		return $this->group_type ? 'Групповой' : 'Личный';
	}

	// Запись авторизационного токена в отдельную таблицу, если тип аккаунта - групповой
	public function extraAuth($auth_token)
	{
		if ($this->group_type)
			$this->authTokensRepository->set($this->id, $auth_token);
	}
}
