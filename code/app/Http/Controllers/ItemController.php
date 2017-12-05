<?php
/**
 * Created by PhpStorm.
 * User: darxan
 * Date: 2017/10/24
 * Time: 23:49
 */

namespace App\Http\Controllers;


use App\Item;
use App\Album;
use App\ItemLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{

    public function save(Request $request)
    {
        $saveResult = $this->saveFile($request, 'picture');
        $data = $request->all();
        if (is_array($saveResult)) {
            $this->setMessage($saveResult);
        } else{
            $data['url'] = $saveResult;
            $data['owner_id'] =
                $request->session()->get(USER_KEY_ID);
            $album_id = $data['album_id'];
            if($album_id) {
                $album = Album::find($album_id);
                $album->background = $saveResult;
                $album->save();
                (new Item())->insert($data);
            } else {
                $this->setMessage("error because of no album_id");
            }
        }

        return $this->redirectHome();
    }

    public function forward(Request $request) {
        $id = $request->all()['id'];
        $item = Item::find($id);
        $user_id = $request->session()->get(USER_KEY_ID);
        $item->owner_id = $user_id;
        (new Item())->insert($item->attributesToArray());
        return $this->redirectHome();
    }


    public function delete(Request $request)
    {

    }

    public function modify(Request $request)
    {

    }

    public function view(Request $request)
    {

    }

    public function label(Request $request)
    {

    }

    public function like(Request $request)
    {
        $data = $request->all();

        $user_id = $request->session()->get(USER_KEY_ID);
        $item_id = $data['item_id'];
        $data['user_id'] = $user_id;

        $like = ItemLike::where('user_id', $user_id)
                        ->where('item_id', $item_id)
                        ->first();

        if (!$like) {
            $item = Item::find($item_id);

            if($item) {
                (new ItemLike())->insert($data);
                $item->likes += 1;
                $item->save();
            } else {
                $this->setMessage("not existed item");
            }
        } else {
            $this->setMessage("already liked on $like->created_at");
        }
        return $this->redirectHome();
    }

    public function comment(Request $request)
    {

    }

}