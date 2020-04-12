<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trees;
use App\Models\Foliages;
use App\Models\Users;
use DB;

class HomeController extends BaseController
{
    public function index($view_type) {
//logger()->error(print_r($view_type,true));
        $trees = new Trees();
//logger()->error(print_r($trees->getAllWithUsers()->title,true));
        $treeInfoList = $trees->getAllKeyId();
//logger()->error(print_r($treeInfoList,true));
        $foliages = new Foliages();
        $foliageInfoList = $foliages->getByTreeIdsGroupTreeId(array_keys($treeInfoList));
//logger()->error(print_r($foliageInfoList,true));
		$users = new Users();
        $data = [];
        foreach ($treeInfoList as $v) {
            $foliageData = $foliageInfoList[$v['id']];
            $data[$v['id']] = $v + ['foliages' => $foliageData];
        }
		return view('home', [
			'title' => '* home *',
			'data' => $data
		]);
    }
}
