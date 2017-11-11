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
use Illuminate\Support\Facades\View;
use Illuminate\Validation\ValidationException;
use Mockery\Exception;

class UserController extends Controller
{

    public function getLogin(Request $request) {
        return View::make('user.login');
    }

    public function postLogin(Request $request) {
        dump($request);

        $data = $request->all();
        try {
            $this->validator($data)->validate();
            $email = $data['email'];
            $password = $data['password'];
            $user = User::where('email', $email)->firstOrFail();
            if ($user) {
                if ($user->password==$password) {
                    dump("right");
                }
            }
            dump("failed");
            return $this->getLogin($request);

        } catch (ValidationException $e) {
            return $this->getLogin($request);
        }
    }

    public function logout(Request $request) {
        $request->session()->forget('reset');
    }

    public function register(Request $request) {
        $data = $request->all();
        $this->validator($data)->validate();
        User::created($data);
    }

    public function getRegister(Request $request) {
        return View::make('user.register');
    }

    /**
     * Get a validator for an incoming registration request.
     * @param array $data
     * @return mixed
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function update(Request $request) {
        dump($request);
        $data = $request->all();
        $user = new User($data);
        $user->update();
    }

    public function resetPassword(Request $request) {

    }

    public function delete(Request $request) {
        $user = User::find($request->session()->get('id'));
        $user->softDeletes();
    }
}