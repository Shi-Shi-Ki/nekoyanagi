<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foliages extends Model
{
    protected $table = 'foliages';

    public function getByTreeId($treeId) {
        return $this->select('user_id','tree_id','foliage_id','comment','created_at','updated_at')
            ->where('tree_id', '=', $treeId)->orderBy('id', 'desc')->get()->toArray();
    }

    public function getByTreeIdsGroupTreeId(array $treeIds) {
        $res = [];
        foreach ($this->select('user_id','tree_id','foliage_id','comment','created_at','updated_at')
            ->whereIn('tree_id', $treeIds)->orderBy('id', 'desc')->get()->toArray() as $v
        ) {
            $res[$v['tree_id']][] = $v;
        }
        return $res;
    }
}
