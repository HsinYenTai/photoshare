<?php
/**
 * Created by PhpStorm.
 * User: darxan
 * Date: 2017/10/24
 * Time: 23:51
 */

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\ValidationException;
use Mockery\Exception;

class AlbumController extends Controller
{

    public function create(Request $request) {
        try {
            $data = $request->all();
            $data['owner_id'] = $request->session()->get(USER_KEY_ID, DEFAULT_USER_ID);
            $this->validator($data)->validate();
            (new Album)->insert($data);
            return $this->redirectHome();
        } catch (ValidationException $e) {
            dump($e);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'description' => 'required|string|min:6',
            'owner_id' => 'required|integer'
        ]);
    }


    public function delete(Request $request)
    {
        $album = Album::find($request->get('id'));
        if ($album && $album->owner_id==$request->session()->get(USER_KEY_ID)) {
            $album->softDeletes();
        }
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
}