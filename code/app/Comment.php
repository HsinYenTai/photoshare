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

    protected $dates = ['deleted_at'];

    protected $fillable = ['user_id', 'item_id', 'content'];

    public function belongsToUser() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function insert($data) {
        foreach ($data as $key=>$value) {
            if (in_array($key, $this->fillable)) {
                $this->$key = $value;
            }
        }

        $this->save();
    }
}