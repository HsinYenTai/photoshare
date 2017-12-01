<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    use SoftDeletes;

    //
    /**
     * 应该被调整为日期的属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title', 'description', 'owner_id', 'label',
        'background', 'likes', 'comments'
    ];

    /**
     * Get the comments for the blog post.
     */
    public function items()
    {
        return $this->hasMany('App\Item');
    }

    public function insert($data) {
        foreach ($data as $key=>$value) {
            if (in_array($key, $this->fillable)) {
                $this->$key = $value;
            }
        }
        $this->background = '../images/pic-none.png';
        $this->likes = 0;
        $this->save();
    }
}
