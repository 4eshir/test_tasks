<?php

namespace app\models\work;

use app\models\base\Users;
use Yii;


class UsersWork extends Users
{
	public function __construct(Users $user)
	{
		parent::__construct();
		// специфическая реализация
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
}
