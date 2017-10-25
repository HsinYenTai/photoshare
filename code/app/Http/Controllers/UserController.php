<?php
/**
 * Created by PhpStorm.
 * User: darxan
 * Date: 2017/10/20
 * Time: 20:00
 */

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     * @param Request $request
     */
    public function login(Request $request)
    {
        dump($request);
        $data = $request->all();
        $this->validator($data)->validate();
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];

        if ($username)
        {
            $user = User::where('username', $username)->firstOrFail();
        }
        else
        {
            $user = User::where('email', $email)->firstOrFail();
        }
        if ($user) {
            if ($user->password==$password)
            {

            }
            else
            {

            }
        }
        else
        {

        }
    }

    public function logout(Request $request) {
        dump($request);
        $request->session()->forget('reset');
    }

    public function register(Request $request) {
        dump($request);
        $data = $request->all();
        $this->validator($data)->validate();
        User::created($data);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $required = 'required|')
    {
        return Validator::make($data, [
            'name' => $required . 'string|max:255',
            'email' => $required . 'string|email|max:255|unique:users',
            'password' => $required . 'string|min:6|confirmed',
        ]);
    }

    public function update(Request $request) {
        dump($request);
        $data = $request->all();
        $user = new User($data);
        $user->update();
    }

    public function resetPassword(Request $request) {
        dump($request);
    }

    public function delete(Request $request) {
        dump($request);
        $user = User::find($request->session()->get('id'));
        $user->softDeletes();
    }
}