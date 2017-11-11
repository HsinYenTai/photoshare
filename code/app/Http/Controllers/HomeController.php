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
use App\Watch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController
{


    public function index(Request $request) {
        $user_id = $request->session()->get(USER_KEY, DEFAULT_USER_ID);
        $albums = Album::where('owner_id', $user_id)->get();
        $items = Item::where('owner_id', $user_id)->get();
        $friends = Watch::where('watcher_id', $user_id)->get();
        $friendsId = [];
        foreach ($friends as $friend) {
            $friendsId[] = $friend->watched_id;
        }
        $timeline = Item::whereIn('owner_id', 'in', $friendsId)->take(20)->get();
        $activities = Activity::all();
        return View::make('user.home',
            [
                'albums'=>$albums,
                'items'=>$items,
                'activities'=>$activities,
                'timeline'=>$timeline,
                'friends'=>$friends,
            ]
        );
    }
}