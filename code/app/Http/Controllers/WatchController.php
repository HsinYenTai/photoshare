<?php
/**
 * Created by PhpStorm.
 * User: darxan
 * Date: 2017/10/24
 * Time: 23:56
 */

namespace App\Http\Controllers;


use App\User;
use App\Watch;
use Illuminate\Http\Request;

class WatchController extends Controller
{
    public function watch(Request $request) {
        $keyword = $request->get('keyword');
        $watched = User::where('id', $keyword)->orWhere('email', $keyword)->first();
        if ($watched) {
            $watch = new Watch();
            $watch->watcher_id = $request->session()->get(USER_KEY_ID);
            $watch->watched_id = $watched->id;
            $watch->label = $request->get('label');
            $watch->save();
        }
        return $this->redirectHome();
    }
}