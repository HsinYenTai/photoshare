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
use App\ItemLike;
use App\User;
use App\Watch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{


    public function index(Request $request) {
        $user_id = $request->session()->get(USER_KEY_ID);
        $user = User::find($user_id);
        $albums = Album::where('owner_id', $user_id)->get();
        $items = Item::where('owner_id', $user_id)->get();
        $friends = Watch::where('watcher_id', $user_id)->get();
        $friendsId = [];
        foreach ($friends as $friend) { $friendsId[] = $friend->watched_id; }
        $recommend = empty($friendsId)? [] : Item::whereIn('owner_id', $friendsId)->take(20)->get();
        if ($request->get('album_id')) {
            $moments = Item::where('album_id', $request->get('album_id'))->get();
        } else if ($request->get('keyword')) {
            $keyword = $request->get('keyword');
            $moments = Item::where('label', 'like', "%$keyword%")
                                ->orWhere('description', 'like', "%$keyword%")
                                ->get();
        } else {
            $moments = Item::paginate(50)->or;
        }

        $activities = Activity::where('date', '>=', date('c'))->get(); // 'c' means iso
        $data = [
            'user'=>$user,
            'albums'=>$albums,
            'items'=>$items,
            'activities'=>$activities,
            'recommends'=>$recommend,
            'moments'=>$moments,
            'friends'=>$friends,
        ];
        return View::make('user.home', $data);
    }

    public function dump(Request $request) {
        dump($request);
        dump($request->all());
        exit();
    }
}