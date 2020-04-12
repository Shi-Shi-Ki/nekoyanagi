<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateTreesController extends Controller
{
    // post
	public function store(Request $request) {
		logger()->info("*** req: ".print_r($request->all(),true));
//sleep(2);
//throw new \Exception("Exception Error Test!");
		return response()->json([
			'status' => 0,
			'data' => ['test_id' => 100],
		]);
	}
}
