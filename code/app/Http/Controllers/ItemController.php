<?php
/**
 * Created by PhpStorm.
 * User: darxan
 * Date: 2017/10/24
 * Time: 23:49
 */

namespace App\Http\Controllers;


use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{

    public function save(Request $request)
    {
        $saveResult = $this->saveFile($request, 'picture');
        $data = $request->all();
        if (is_array($saveResult)) {
            dump($saveResult);
            exit();
        }

        $data['url'] = $saveResult;
        $data['owner_id'] =
            $request->session()->get(USER_KEY_ID, DEFAULT_USER_ID);
        (new Item())->insert($data);
        return $this->redirectHome();
    }

    public function forward(Request $request) {
        $id = $request->all()['id'];
        $item = Item::find($id);
        $user_id = $request->session()->get(USER_KEY_ID, DEFAULT_USER_ID);
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

    public function praise(Request $request)
    {

    }

    public function comment(Request $request)
    {

    }

}