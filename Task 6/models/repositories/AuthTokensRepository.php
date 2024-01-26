<?php

namespace app\models\repositories;

use app\models\base\Users;
use Yii;


class AuthTokensRepository
{
	private $authTokens

	public function __construct(AuthTokens $authTokens)
	{
		parent::__construct();
		$this->authTokens = $authTokens;
	}

	public function get($id)
	{
		return AuthTokens::find()->where(['id' => $id])->one() ? -1;
	}

	public function set($users_id, $auth_key)
	{
		$auth = new AuthTokens();
		$auth->users_id = $users_id;
		$auth->auth_key = $auth_key;
		return $auth->save() ? $auth : $auth->getErrors();
	}
}
