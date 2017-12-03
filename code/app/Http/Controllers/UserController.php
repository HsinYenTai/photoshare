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

        $data = $request->all();

        try {

            $this->validator($data)->validate();
            $email = $data['email'];
            $password = $data['password'];
            $user = User::where('email', $email)->firstOrFail();

            if ($user) {
                if ($user->password==$password) {
                    $this->login($request, $user);
                    return redirect()->action('HomeController@index', $request);
                }
            }
            dump('fail');
        } catch (ValidationException $e) {
            dump($e);
            exit();
        }

    }

    public function login(Request $request, User $user) {
        $request->session()->put(USER_KEY_ID, $user->id);
        if ($user->is_admin) {
            $request->session()->put(ADMIN_KEY_ID, $user->id);
        }
    }

    public function logout(Request $request) {
        $request->session()->forget(USER_KEY_ID);
        $request->session()->forget(ADMIN_KEY_ID);
    }

    public function postRegister(Request $request) {
        $data = $request->all();
        $this->validator($data)->validate();
        $data['avatar'] = $this->avatar($data['email']);
        (new User)->insert($data);
        return $this->postLogin($request);
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
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);
    }

    public function view(Request $request) {
        if (!$request->session()->get(ADMIN_KEY_ID, DEFAULT_USER_ID)) {
            return $this->redirectHome();
        }
        $keyword = $request->get('keyword');
        if (!$keyword) {
            $users = User::all();
        } else  {
            $users = User::where('id', $keyword)
                        ->orWhere('email', 'like', "$keyword%")
                        ->orWhere('name', 'like', "%$keyword%")
                        ->get();
        }
        return View::make('admin.user', ['users'=>$users]);
    }

    public function detail(Request $request) {
        $id = $request->session()->get(USER_KEY_ID, DEFAULT_USER_ID);
        $user = User::find($id);
        return View::make('user.user', ['user'=>$user]);
    }

    public function update(Request $request) {

        $saveResult = $this->saveFile($request, 'avatar');
        $data = $request->all();
        if (!is_array($saveResult)) {
            $data['avatar'] = $saveResult;
        }
        $user = User::find($request->session()->get(USER_KEY_ID, DEFAULT_USER_ID));
        $user->insert($data);
        return View::make('user.user', ['user'=>$user]);
    }

    protected function adminUpdate(Request $request) {
        $data = $request->all();
        if ($request->session()->get(ADMIN_KEY_ID, DEFAULT_USER_ID)) {
            $user = User::find($data['id']);
            $user->insert($data);
            return redirect()->action('UserController@view');
        }
        return $this->redirectHome();
    }

    public function resetPassword(Request $request) {

    }

    public function delete(Request $request) {
        $user = User::find($request->get('id'));
        dump($user);
        $user->delete();
        return View::make('admin.user', ['users'=>User::all()]);
    }

    public function avatar($email) {

        $default = "https://bootdey.com/img/Content/avatar/avatar1.png";
        $size = 40;
        $avatar_url = "https://www.gravatar.com/avatar/" .
            md5( strtolower( trim( $email ) ) ) .
            "?d=" . urlencode( $default ) . "&s=" . $size;
        return $avatar_url;
    }
}