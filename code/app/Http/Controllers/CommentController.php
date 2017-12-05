<?php
/**
 * Created by PhpStorm.
 * User: darxan
 * Date: 2017/12/2
 * Time: 11:33
 */

namespace App\Http\Controllers;


use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function comment(Request $request) {
        $data = $request->all();
        $user_id = $request->session()->get(USER_KEY_ID);
        if ($user_id) {
            $data['user_id'] = $user_id;
            (new Comment())->insert($data);
        } else {
            $this->setMessage("plz login first");
        }

        return $this->redirectHome();
    }
}