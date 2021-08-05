<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function instance () {
        $configs = new Config();
        $json = $configs->all()[0]->json;
        $config = json_decode($json, true);
        if ($config['status'] == 'enabled')
            return view('instance', ['config'=>$config]);
        else
            return view('blocked');
    }
}
