<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function instance ($dbname) {
        $json = DB::connection($dbname)->select('select json from config')[0]->json;
        $config = json_decode($json, true);
        if ($config['status'] == 'enabled')
            return view('instance', ['config'=>$config]);
        else
            return view('blocked');
    }
}
