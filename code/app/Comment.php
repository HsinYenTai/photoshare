<?php
/**
 * Created by PhpStorm.
 * User: darxan
 * Date: 2017/12/1
 * Time: 10:12
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model {

    use SoftDeletes;

}