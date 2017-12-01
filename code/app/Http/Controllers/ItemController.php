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
        $saveResult = $this->saveFile($request);
        $data = $request->all();
        if (is_array($saveResult)) {
            dump($saveResult);
            exit();
        }

        $data['url'] = $saveResult;
        $data['owner_id'] = $request->session()->get(USER_KEY_ID, DEFAULT_USER_ID);
        (new Item())->insert($data);
        return redirect()->action('HomeController@index');
    }

    private function saveFile(Request $request) {
        //判断请求中是否包含name=file的上传文件
        if(!$request->hasFile('picture')){
            return ['上传文件为空！'];
        }
        $file = $request->file('picture');
        //判断文件上传过程中是否出错
        if(!$file->isValid()){
            return ['文件上传出错！'];
        }
        $newFileName = md5(time().rand(0,10000)).'.'.$file->getClientOriginalExtension();
        $savePath = 'public/pictures/'.$newFileName;
        $urlPath = '../storage/pictures/'.$newFileName;
        Storage::put(
            $savePath,
            file_get_contents($file->getRealPath())
        );
        if(!Storage::exists($savePath)){
            return ['保存文件失败！'];
        }
        return $urlPath;
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

    public function forward(Request $request)
    {

    }
}