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


    protected function getMoments(Request $request, $user) {
        if ($request->get('album_id')) {
            return Item::where('album_id', $request->get('album_id'))->latest()->get();
        } else if ($request->get('keyword')) {
            $keyword = $request->get('keyword');
            return Item::where('label', 'like', "%$keyword%")
                ->orWhere('description', 'like', "%$keyword%")
                ->latest()
                ->get();
        } else {
            return Item::where('created_at', '>=', $user->updated_at)->orderby('likes', 'desc')->get();
        }
    }

    protected function getWatched($friendsId) {
        return empty($friendsId)? [] : Item::whereIn('owner_id', $friendsId)->take(20)->get();
    }

    public function index(Request $request) {
        $user_id = $request->session()->get(USER_KEY_ID);
        if (!$user_id) {
            $this->setMessage("plz login first");
            return $this->getLogin($request);
        }
        $user = User::find($user_id);
        $albums = Album::where('owner_id', $user_id)->latest()->get();
        $items = Item::where('owner_id', $user_id)->latest()->get();
        $friends = Watch::where('watcher_id', $user_id)->latest()->get();
        $friendsId = [];
        foreach ($friends as $friend) { $friendsId[] = $friend->watched_id; }
        $watched = $this->getWatched($friendsId);
        $moments = $this->getMoments($request, $user);

        $activities = Activity::where('date', '>=', date('c'))->get(); // 'c' means iso
        $data = [
            'user'=>$user,
            'albums'=>$albums,
            'items'=>$items,
            'activities'=>$activities,
            'watched'=>$watched,
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