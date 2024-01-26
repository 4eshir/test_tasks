<?php

namespace app\models\repositories;

use app\models\base\Users;
use Yii;


class UsersRepository
{
	private $users

	public function __construct(Users $user)
	{
		parent::__construct();
		$this->users = $users;
	}

	public function get($email)
	{
		if (!preg_match('/^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/u', $email))
			throw new Exception('Email имеет некорректный формат')

		return Users::find()->where(['email' => $email])->one() ? -1;
	}

	public function set($email, $password, $name, $sex, $deleted = true, $status_id = 1)
	{
		$user = new Users();
		$user->email = $email;
		$user->password = $password;
		$user->name = $name;
		$user->sex = $sex;
		$user->deleted = $deleted;
		$user->status_id = $status_id;
		$user->created_at = date();
		return $user->save() ? $user : $user->getErrors();
	}
}
