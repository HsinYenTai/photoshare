<?php
/**
 * Created by PhpStorm.
 * User: darxan
 * Date: 2017/10/24
 * Time: 23:46
 */

namespace App\Http\Controllers;


use App\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function save(Request $request) {
        $data = $request->all();
        $data['owner_id'] = $request->session()->get(USER_KEY_ID, DEFAULT_USER_ID);
        (new Activity())->insert($data);
        return $this->redirectHome();
    }

    public function delete(Request $request) {

    }

    public function modify(Request $request) {

    }

    public function view(Request $request) {

    }

    public function join(Request $request) {

    }
}