<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trees extends Model
{
    protected $table = 'trees';

	public function users() {
		return $this->belongsTo('\App\Models\Users', 'user_id');
	}

    public function getAll() {
        return $this->select('id', 'title', 'comment', 'user_id', 'created_at', 'updated_at')
            ->orderBy('id', 'desc')->get()->toArray();
    }

	public function getAllWithUsers() {
		//return $this->users();
		return self::find(1)->users;
	}

    public function getAllKeyId() {
        $res = [];
        foreach ($this->getAll() as $v) {
            $res[$v['id']] = $v;
        }
        return $res;
    }
}
