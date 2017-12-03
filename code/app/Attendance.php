<?php
/**
 * Created by PhpStorm.
 * User: darxan
 * Date: 2017/12/3
 * Time: 14:42
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Attendance extends Model
{
    use Notifiable;
    use SoftDeletes;

    //
    /**
     * 应该被调整为日期的属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'activity_id', 'user_id',
    ];

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