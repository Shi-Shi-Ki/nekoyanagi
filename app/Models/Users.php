<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
	protected $table = 'users';

	public function trees() {
		return $this->hasMany('\App\Models\Trees', 'user_id');
	}

	public function getAll() {
		return $this->select('id','name','email','password','remember_token')->get()->toArray();
	}

	public function getInIds(array $ids) {
		$tmp = $this->select('id','name','email','password','remember_token')->whereIn('id', $ids)->toArray();
		if (empty($tmp)) return null;
		$res = [];
		foreach ($tmp as $v) {
			$res[$v['id']] = $v;
		}
		return $res;
	}
}
