<?php
/**
 * Created by PhpStorm.
 * User: darxan
 * Date: 2017/10/24
 * Time: 23:46
 */

namespace App\Http\Controllers;


use App\Activity;
use App\Attendance;
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
        $activity_id = $request->get('activity_id');
        $activity = Activity::find($activity_id);
        if ($activity && $activity->owner_id==$request->session()->get(USER_KEY_ID, DEFAULT_INCLUDE_PATH)) {
            $activity->delete();
        }
        return $this->redirectHome();
    }

    public function modify(Request $request) {

    }

    public function view(Request $request) {

    }

    public function attendant(Request $request) {
        $data = $request->all();

        $user_id = $request->session()->get(USER_KEY_ID, DEFAULT_USER_ID);
        $item_id = $data['activity_id'];
        $data['user_id'] = $user_id;

        $attendance = Attendance::where('user_id', $user_id)
            ->where('activity_id', $item_id)
            ->first();

        if (!$attendance) {
            $activity = Activity::find($item_id);

            if($activity) {
                (new Attendance())->insert($data);
                $activity->likes += 1;
                $activity->save();
            }
        }
        return $this->redirectHome();
    }
}