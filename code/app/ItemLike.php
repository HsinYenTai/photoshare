<?php
/**
 * Created by PhpStorm.
 * User: darxan
 * Date: 2017/12/3
 * Time: 14:16
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class ItemLike extends Model
{
    use Notifiable;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_id', 'user_id',
    ];

    public function insert($data) {
        foreach ($data as $key=>$value) {
            if (in_array($key, $this->fillable)) {
                $this->$key = $value;
            }
        }
        $this->save();
    }
}