<?php namespace App\Http\Controllers\Admin\Comments;

use Illuminate\Database\Eloquent\Model;
use App;

class Comments extends Model {

    protected $table = 'comments';

    public function user()
    {
        return $this->hasOne('App\Http\Controllers\Admin\Users\Users', 'id', 'user_id');
    }

    public function item()
    {
        return $this->hasOne('App\Http\Controllers\Admin\Items\Items', 'id', 'item_id');
    }

}