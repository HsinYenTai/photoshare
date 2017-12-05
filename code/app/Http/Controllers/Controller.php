<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getLogin(Request $request) {
        return View::make('user.login');
    }

    protected function redirectHome() {
        return redirect()->action('HomeController@index');
    }

    protected function saveFile(Request $request, $fileName) {
        //判断请求中是否包含name=file的上传文件
        if(!$request->hasFile($fileName)){
            return ['上传文件为空！'];
        }
        $file = $request->file($fileName);
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

}
