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

class AlbumController
{
    public function create(Request $request) {
        try {
            $data = $request->all();
            $data['owner_id'] = $request->session()->get('user_id', '1');
            $this->validator($data)->validate();
            (new Album)->insert($data);
            return \redirect()->action('HomeController@index');

        } catch (ValidationException $e) {
            dump($e);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:6',
            'owner_id' => 'required|integer'
        ]);
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
}