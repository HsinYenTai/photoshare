<?php
/**
 * Created by PhpStorm.
 * User: darxan
 * Date: 2017/10/24
 * Time: 23:55
 */

namespace App\Http\Controllers;


use App\Activity;
use App\Album;
use App\Item;
use App\User;
use App\Watch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController
{


    public function index(Request $request) {
        $user_id = $request->session()->get(USER_KEY_ID, DEFAULT_USER_ID);
        $user = User::find($user_id);
        $albums = Album::where('owner_id', $user_id)->get();
        $items = Item::where('owner_id', $user_id)->get();
        $friends = Watch::where('watcher_id', $user_id)->get();
        $friendsId = [];
        foreach ($friends as $friend) {
            $friendsId[] = $friend->watched_id;
        }
        $recommend = empty($friendsId)? [] : Item::whereIn('owner_id', $friendsId)->take(20)->get();
        $moments = Item::paginate(50);
        $activities = Activity::all();

        $data = [
            'user'=>$user,
            'albums'=>$albums,
            'items'=>$items,
            'activities'=>$activities,
            'recommend'=>$recommend,
            'moments'=>$moments,
            'friends'=>$friends,
        ];
        dump($moments);
        return View::make('user.home', $data);
    }

    public function dump(Request $request) {
        dump($request);
        dump($request->all());
        exit();
    }
}