<?php namespace App\Http\Controllers\Admin\Feedbacks;

use Illuminate\Database\Eloquent\Model;
use App;

class Feedbacks extends Model {

    protected $table = 'feedbacks';

    public function user()
    {
        return $this->hasOne('App\Http\Controllers\Admin\Users\Users', 'id', 'user_id');
    }

}