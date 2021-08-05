<?php

namespace App\Http\Controllers;

use App\Models\Instance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MainController extends Controller
{
    public function dashboard() {
        $instances = new Instance();
        $configs = [];
        foreach($instances->all() as $i) {
            $json = DB::connection($i->dbname)->select('select json from configs')[0]->json;
            if ($json){
                $config = json_decode($json, true);
                if ($config['status'] == 'enabled') {
                    $config['status'] = true;
                }
                else {
                    $config['status'] = false;
                }
                $configs[$i->name] = $config;
            }
        }
        $str = json_encode($configs);
        File::put('../instance_folder/public_config/config.json', $str);
        return view('dashboard', ['instances' => $instances->all(), 'configs' => $configs]);
    }

    public function updateTable(Request $request) {
        $instances = new Instance();
        foreach($instances->all() as $i) {
            $json = [];
            $json['title'] = $request['title'.$i->id];
            $json['description'] = $request['desc'.$i->id];
            if ($request['status'.$i->id] == 'on') {
                $json['status'] = 'enabled';
            }
            else {
                $json['status'] = 'disabled';
            }
            $str = json_encode($json);
            $str = preg_replace('/"/', '\"', $str);
            $res = DB::connection($i->dbname)->select('update configs set json = "'.$str.'"');
        }
        return redirect()->route('dashboard');
    }
}
