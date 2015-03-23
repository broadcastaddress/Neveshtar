<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model {

	protected $table = 'comments';

    public function replies()
    {
        return $this->hasMany('App\Comments', 'parent_id')->where('status',1);
    }

    public function user() {
	    return $this->hasOne('App\User','id','user_id');
    }

}
